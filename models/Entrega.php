<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entrega".
 *
 * @property integer $id_entrega
 * @property string $tonelada
 * @property string $fecha
 * @property integer $id_orden_trabajo
 *
 * @property OrdenTrabajo $idOrdenTrabajo
 */
class Entrega extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entrega';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_orden_trabajo'], 'required'],
            [['id_orden_trabajo'], 'integer'],
            [['fecha'], 'safe'],
            [['tonelada'], 'string', 'max' => 45],
            [['id_orden_trabajo'], 'exist', 'skipOnError' => true, 'targetClass' => OrdenTrabajo::className(), 'targetAttribute' => ['id_orden_trabajo' => 'id_orden_trabajo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tonelada' => 'Toneladas',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrdenTrabajo()
    {
        return $this->hasOne(OrdenTrabajo::className(), ['id_orden_trabajo' => 'id_orden_trabajo']);
    }
}
