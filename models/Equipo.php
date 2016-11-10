<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipo".
 *
 * @property integer $id_equipo
 * @property string $descripcion
 * @property string $estado
 * @property string $fecha_creacion
 * @property integer $id_plan
 *
 * @property AutomorEquipo[] $automorEquipos
 * @property Automotor[] $idAutomors
 * @property Plan $idPlan
 * @property OrdenTrabajo[] $ordenTrabajos
 * @property Personal[] $personals
 * @property Empleado[] $idEmpleados
 */
class Equipo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'id_plan'], 'required'],
            [['estado'], 'string'],
            [['fecha_creacion'], 'safe'],
            [['id_plan'], 'integer'],
            [['descripcion'], 'string', 'max' => 150],
            [['id_plan'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::className(), 'targetAttribute' => ['id_plan' => 'id_plan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_equipo' => 'Id Equipo',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
            'fecha_creacion' => 'Fecha Creacion',
            'id_plan' => 'Id Plan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutomorEquipos()
    {
        return $this->hasMany(AutomorEquipo::className(), ['id_equipo' => 'id_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAutomors()
    {
        return $this->hasMany(Automotor::className(), ['id_automotor' => 'id_automor'])->viaTable('automor_equipo', ['id_equipo' => 'id_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPlan()
    {
        return $this->hasOne(Plan::className(), ['id_plan' => 'id_plan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenTrabajos()
    {
        return $this->hasMany(OrdenTrabajo::className(), ['id_equipo' => 'id_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonals()
    {
        return $this->hasMany(Personal::className(), ['id_equipo' => 'id_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['id_empleado' => 'id_empleado'])->viaTable('personal', ['id_equipo' => 'id_equipo']);
    }
}
