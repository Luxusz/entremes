<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $ID
 * @property string $Nombre
 * @property string $Descripcion
 * @property integer $Cantidad
 * @property integer $Valor
 * @property string $ProductoImg
 * @property integer $Tipo_ID
 *
 * @property Tipo $tipo
 */
class Producto extends \yii\db\ActiveRecord
{
    
    public $ProductoImg;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Descripcion', 'Cantidad', 'Valor', 'Tipo_ID'], 'required'],
            [['Cantidad', 'Valor', 'Tipo_ID'], 'integer'],
            [['Nombre'], 'string', 'max' => 60],
            [['ProductoImg'], 'string', 'max' => 200],
            [['Nombre'], 'unique'],
            [['Tipo_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['Tipo_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripción',
            'Cantidad' => 'Cantidad',
            'Valor' => 'Valor',
            'ProductoImg' => 'Foto',
            'Tipo_ID' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(Tipo::className(), ['ID' => 'Tipo_ID']);
    }
}
