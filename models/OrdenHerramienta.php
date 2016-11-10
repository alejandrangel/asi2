<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orden_herramienta".
 *
 * @property integer $id_orden
 * @property integer $id_herramienta
 *
 * @property Herramienta $idHerramienta
 * @property OrdenTrabajo $idOrden
 */
class OrdenHerramienta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orden_herramienta';
    }

    public static function primaryKey()
    {
        return array('id_orden','id_herramienta');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_orden', 'id_herramienta'], 'required'],
            [['id_orden', 'id_herramienta'], 'integer'],
            [['id_herramienta'], 'exist', 'skipOnError' => true, 'targetClass' => Herramienta::className(), 'targetAttribute' => ['id_herramienta' => 'id_herramienta']],
            [['id_orden'], 'exist', 'skipOnError' => true, 'targetClass' => OrdenTrabajo::className(), 'targetAttribute' => ['id_orden' => 'id_orden_trabajo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_orden_herramienta' => 'Id Orden Herramienta',
            'id_orden' => 'Id Orden',
            'id_herramienta' => 'Id Herramienta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdHerramienta()
    {
        return $this->hasOne(Herramienta::className(), ['id_herramienta' => 'id_herramienta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrden()
    {
        return $this->hasOne(OrdenTrabajo::className(), ['id_orden_trabajo' => 'id_orden']);
    }
}
