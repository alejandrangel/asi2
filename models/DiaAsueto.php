<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dia_asueto".
 *
 * @property integer $id_dia_asueto
 * @property string $fecha
 * @property integer $plan
 *
 * @property Plan $plan0
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
            [['id_dia_asueto'], 'required'],
            [['id_dia_asueto', 'plan'], 'integer'],
            [['fecha'], 'safe'],
            [['plan'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::className(), 'targetAttribute' => ['plan' => 'id_plan']],
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
            'plan' => 'Plan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan0()
    {
        return $this->hasOne(Plan::className(), ['id_plan' => 'plan']);
    }
}
