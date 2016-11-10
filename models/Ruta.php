<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ruta".
 *
 * @property integer $id_ruta
 * @property string $nombre
 *
 * @property ActividadPlanificada[] $actividadPlanificadas
 * @property RutaColonia[] $rutaColonias
 * @property Solicitud[] $solicituds
 */
class Ruta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ruta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ruta', 'nombre'], 'required'],
            [['id_ruta'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ruta' => 'Código',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividadPlanificadas()
    {
        return $this->hasMany(ActividadPlanificada::className(), ['id_ruta' => 'id_ruta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutaColonias()
    {
        return $this->hasMany(RutaColonia::className(), ['id_ruta' => 'id_ruta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['id_ruta' => 'id_ruta']);
    }
}
