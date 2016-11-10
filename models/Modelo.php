<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modelo".
 *
 * @property integer $id_modelo
 * @property string $modelo
 * @property integer $marca
 *
 * @property Automotor[] $automotors
 * @property Marca $marca0
 */
class Modelo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modelo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_modelo'], 'required'],
            [['id_modelo', 'marca'], 'integer'],
            [['modelo'], 'string', 'max' => 45],
            [['marca'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::className(), 'targetAttribute' => ['marca' => 'id_marca']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_modelo' => 'Id Modelo',
            'modelo' => 'Modelo',
            'marca' => 'Marca',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutomotors()
    {
        return $this->hasMany(Automotor::className(), ['modelo' => 'id_modelo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarca0()
    {
        return $this->hasOne(Marca::className(), ['id_marca' => 'marca']);
    }
}
