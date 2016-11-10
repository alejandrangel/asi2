<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "herramienta".
 *
 * @property integer $id_herramienta
 * @property string $descripcion
 * @property string $activo
 *
 * @property OrdenHerramienta[] $ordenHerramientas
 */
class Herramienta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'herramienta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_herramienta', 'descripcion'], 'required'],
            [['id_herramienta'], 'integer'],
            [['descripcion'], 'string', 'max' => 200],
            [['activo'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_herramienta' => 'Id Herramienta',
            'descripcion' => 'Descripcion',
            'activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenHerramientas()
    {
        return $this->hasMany(OrdenHerramienta::className(), ['id_herramienta' => 'id_herramienta']);
    }
}
