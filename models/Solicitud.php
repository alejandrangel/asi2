<?php

namespace app\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "solicitud".
 *
 * @property integer $id_solicitud
 * @property string $fecha
 * @property string $telefono
 * @property string $email
 * @property string $nombre
 * @property string $direccion
 * @property string $observacion
 * @property integer $id_estado
 * @property integer $id_fuente
 * @property integer $id_usuario
 * @property string $referencia
 * @property integer $id_ruta
 *
 * @property Estado $idEstado
 * @property Fuente $idFuente
 * @property Ruta $idRuta
 */
class Solicitud extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['telefono','nombre','direccion','observacion','comentario', 'id_colonia'], 'required'],
            [['id_colonia'], 'integer'],
            [['fecha'], 'safe'],
            [['telefono', 'email', 'nombre', 'direccion', 'observacion','comentario', 'referencia'], 'string'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_solicitud' => 'No. de Ref.',
            'fecha' => 'Fecha',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'observacion' => 'Observacion',
            'id_estado' => 'Estado',
            'id_fuente' => 'Fuente',
            'id_usuario' => 'Ingresó',
            'referencia' => 'Punto de Referencia',
            'id_colonia' => 'Colonia',
            'comentario' => 'Comentario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado()
    {
        return $this->hasMany(Estado::className(), ['estado' => 'estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFuente()
    {
        return $this->hasOne(Fuente::className(), ['id_fuente' => 'id_fuente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRuta()
    {
        return $this->hasOne(Ruta::className(), ['id_ruta' => 'id_ruta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdColonia()
    {
        return $this->hasOne(Colonia::className(), ['id_colonia' => 'id_colonia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasMany(Usuario::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuRutas() 
    {
        return ArrayHelper::map(Ruta::find()->all(), 'id_ruta', 'nombre');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuColonias() 
    {
        return ArrayHelper::map(Colonia::find()->all(), 'id_colonia', 'nombre');
    }

}
