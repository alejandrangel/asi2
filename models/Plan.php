<?php

namespace app\models;


/**
 * This is the model class for table "plan".
 *
 * @property integer $id_plan
 * @property string $fecha_inicia
 * @property string $fecha_final
 * @property string $descripcion
 * @property string $estado
 *
 * @property ActividadPlanificada[] $actividadPlanificadas
 * @property DiaAsueto[] $diaAsuetos
 * @property Equipo[] $equipos
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_inicia', 'fecha_final','descripcion'], 'required'],
            [['id_plan'], 'integer'],
            [['fecha_inicia', 'fecha_final'], 'safe'],
            [['estado'], 'string'],
            [['descripcion'], 'string', 'max' => 255],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_plan' => 'Plan',
            'fecha_inicia' => 'Fecha Inicia',
            'fecha_final' => 'Fecha Final',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividadPlanificadas()
    {
        return $this->hasMany(ActividadPlanificada::className(), ['id_plan' => 'id_plan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiaAsuetos()
    {
        return $this->hasMany(DiaAsueto::className(), ['plan' => 'id_plan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipos()
    {
        return $this->hasMany(Equipo::className(), ['id_plan' => 'id_plan']);
    }


}
