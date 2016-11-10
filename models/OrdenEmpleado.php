<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orden_empleado".
 *
 * @property integer $id_empleado
 * @property integer $id_orden
 * @property string $observaciones
 *
 * @property Empleado $idEmpleado
 * @property OrdenTrabajo $idOrden
 */
class OrdenEmpleado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orden_empleado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado', 'id_orden'], 'required'],
            [['id_empleado', 'id_orden'], 'integer'],
            [['observaciones'], 'string', 'max' => 500],
            [['id_empleado'], 'exist', 'skipOnError' => true, 'targetClass' => Empleado::className(), 'targetAttribute' => ['id_empleado' => 'id_empleado']],
            [['id_orden'], 'exist', 'skipOnError' => true, 'targetClass' => OrdenTrabajo::className(), 'targetAttribute' => ['id_orden' => 'id_orden_trabajo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empleado' => 'Id Empleado',
            'id_orden' => 'Id Orden',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado()
    {
        return $this->hasOne(Empleado::className(), ['id_empleado' => 'id_empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrden()
    {
        return $this->hasOne(OrdenTrabajo::className(), ['id_orden_trabajo' => 'id_orden']);
    }
}
