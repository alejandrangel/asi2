<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orden_actividad".
 *
 * @property integer $id_orden_actividad
 * @property integer $id_orden
 * @property integer $id_actividad
 * @property string $dias
 * @property string $fecha_inicio
 * @property string $fecha_final
 * @property integer $periodicidad
 *
 * @property Actividad $actividad
 * @property OrdenTrabajo $orden
 */
class OrdenActividad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orden_actividad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_orden_actividad'], 'required'],
            [['id_orden_actividad', 'id_orden', 'id_actividad', 'periodicidad'], 'integer'],
            [['dias'], 'string'],
            [['fecha_inicio', 'fecha_final'], 'string', 'max' => 45],
            [['id_actividad'], 'exist', 'skipOnError' => true, 'targetClass' => Actividad::className(), 'targetAttribute' => ['id_actividad' => 'id_actividad']],
            [['id_orden'], 'exist', 'skipOnError' => true, 'targetClass' => OrdenTrabajo::className(), 'targetAttribute' => ['id_orden' => 'id_orden_trabajo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_orden_actividad' => 'Id Orden Actividad',
            'id_orden' => 'Id Orden',
            'id_actividad' => 'Id Actividad',
            'dias' => 'Dias',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_final' => 'Fecha Final',
            'periodicidad' => 'Periodicidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividad()
    {
        return $this->hasOne(Actividad::className(), ['id_actividad' => 'id_actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrden()
    {
        return $this->hasOne(OrdenTrabajo::className(), ['id_orden_trabajo' => 'id_orden']);
    }
}
