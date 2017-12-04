<?php

namespace app\models; 
use Yii;

class User extends \yii\base\Object implements yii\db\ActiveRecordInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];
    
    

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        
       
        foreach ($users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //return $this->password === $password;
        return Yii::$app->getSecurity()->validatePassword($password,$this->password);
    }

        public function attributes() {
        
    }

    public function delete() {
        
    }

    public function equals($record) {
        
    }

    public function getAttribute($name) {
        
    }

    public function getIsNewRecord() {
        
    }

    public function getOldPrimaryKey($asArray = false) {
        
    }

    public function getPrimaryKey($asArray = false) {
        
    }

    public function getRelation($name, $throwException = true) {
        
    }

    public function hasAttribute($name) {
        
    }

    public function insert($runValidation = true, $attributes = null) {
        
    }

    public function link($name, $model, $extraColumns = array()) {
        
    }

    public function populateRelation($name, $records) {
        
    }

    public function save($runValidation = true, $attributeNames = null) {
        
    }

    public function setAttribute($name, $value) {
        
    }

    public function unlink($name, $model, $delete = false) {
        
    }

    public function update($runValidation = true, $attributeNames = null) {
        
    }

    public static function deleteAll($condition = null) {
        
    }

    public static function find() {
        
    }

    public static function findAll($condition) {
        
    }

    public static function findOne($condition) {
        
    }

    public static function getDb() {
        
    }

    public static function isPrimaryKey($keys) {
        
    }

    public static function primaryKey() {
        
    }

    public static function updateAll($attributes, $condition = null) {
        
    }

}
