<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dia_asueto".
 *
 * @property integer $id_dia_asueto
 * @property string $fecha
 */
class DiaAsueto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dia_asueto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'required'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dia_asueto' => 'Id Dia Asueto',
            'fecha' => 'Fecha',
        ];
    }
}
