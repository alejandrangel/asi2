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
 *
 * @property AutomorEquipo[] $automorEquipos
 * @property Automotor[] $idAutomors
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
            [['descripcion'], 'required'],
            [['descripcion'], 'unique'],
            [['estado'], 'string'],
            [['fecha_creacion'], 'safe'],
            [['descripcion'], 'string', 'max' => 150],
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
