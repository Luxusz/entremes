<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $authkey
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authkey'], 'required'],
            [['username'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 60],
            [['authkey'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authkey' => 'Authkey',
            'acces_token'=>'Access Token',
        ];
    }

    public function getAuthKey() {
        return $this->authkey;
    }

    public function getId() {
         return $this->id;
    }

    public function validateAuthKey($authKey) {
        $this->authkey === $authKey;
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new \yii\base\NotSupportedException;
    }
    public static function findbyUsername($username)
    {
        return self::findOne(['username'=>$username]);
    }
    public function validatePassword($password)
    {
       $user = Usuario::findOne(['username'=>  $this->username]);
        if($user!=null)
        {
            $hash = $user->password;
            if(Yii::$app->getSecurity()->validatePassword($password, $hash))
            {
                return true;
            }
        }
        return false;
    }
    public function beforeSave($insert) 
    {
        if(parent::beforeSave($insert))
        {
            if($this->isNewRecord)
            {
                $this->access_token=\Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
        
    }

}
