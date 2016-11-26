<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property integer $id_estado
 * @property string $estado
 * @property string $descripcion
 * @property integer $id_tabla
 *
 * @property Automotor[] $automotors
 * @property CatalogoTabla $idTabla
 * @property Solicitud[] $solicituds
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tabla'], 'integer'],
            [['estado', 'descripcion'], 'string', 'max' => 45],
            [['id_tabla'], 'exist', 'skipOnError' => true, 'targetClass' => CatalogoTabla::className(), 'targetAttribute' => ['id_tabla' => 'id_catalogo_tabla']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estado' => 'Id Estado',
            'estado' => 'Estado',
            'descripcion' => 'Descripcion',
            'id_tabla' => 'Id Tabla',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutomotors()
    {
        return $this->hasMany(Automotor::className(), ['estado' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTabla()
    {
        return $this->hasOne(CatalogoTabla::className(), ['id_catalogo_tabla' => 'id_tabla']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['id_estado' => 'id_estado']);
    }
}
