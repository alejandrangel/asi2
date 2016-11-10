<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "automotor".
 *
 * @property integer $id_automotor
 * @property string $placa
 * @property integer $modelo
 * @property integer $anio
 * @property string $capacidad
 * @property integer $tipo
 * @property integer $estado
 * @property string $chasis
 * @property integer $color
 * @property string $numero_motor
 * @property integer $combustible
 *
 * @property AutomorEquipo[] $automorEquipos
 * @property Equipo[] $equipos
 * @property Color $color0
 * @property Combustible $combustible0
 * @property Estado $estado0
 * @property Modelo $modelo0
 * @property Tipo $tipo0
 * @property AutomotorHistorial[] $automotorHistorials
 * @property OrdenAutomotor[] $ordenAutomotors
 */
class Automotor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'automotor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_automotor'], 'required'],
            [['id_automotor', 'modelo', 'anio', 'tipo', 'estado', 'color', 'combustible'], 'integer'],
            [['placa', 'capacidad', 'chasis', 'numero_motor'], 'string', 'max' => 45],
            [['color'], 'exist', 'skipOnError' => true, 'targetClass' => Color::className(), 'targetAttribute' => ['color' => 'id_color']],
            [['combustible'], 'exist', 'skipOnError' => true, 'targetClass' => Combustible::className(), 'targetAttribute' => ['combustible' => 'id_combustible']],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado' => 'id_estado']],
            [['modelo'], 'exist', 'skipOnError' => true, 'targetClass' => Modelo::className(), 'targetAttribute' => ['modelo' => 'id_modelo']],
            [['tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['tipo' => 'id_tipo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_automotor' => 'Id Automotor',
            'placa' => 'Placa',
            'modelo' => 'Modelo',
            'anio' => 'Anio',
            'capacidad' => 'Capacidad',
            'tipo' => 'Tipo',
            'estado' => 'Estado',
            'chasis' => 'Chasis',
            'color' => 'Color',
            'numero_motor' => 'Numero Motor',
            'combustible' => 'Combustible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutomorEquipos()
    {
        return $this->hasMany(AutomorEquipo::className(), ['id_automor' => 'id_automotor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipos()
    {
        return $this->hasMany(Equipo::className(), ['id_equipo' => 'id_equipo'])->viaTable('automor_equipo', ['id_automor' => 'id_automotor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColor0()
    {
        return $this->hasOne(Color::className(), ['id_color' => 'color']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCombustible0()
    {
        return $this->hasOne(Combustible::className(), ['id_combustible' => 'combustible']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado0()
    {
        return $this->hasOne(Estado::className(), ['id_estado' => 'estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModelo0()
    {
        return $this->hasOne(Modelo::className(), ['id_modelo' => 'modelo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo0()
    {
        return $this->hasOne(Tipo::className(), ['id_tipo' => 'tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutomotorHistorials()
    {
        return $this->hasMany(AutomotorHistorial::className(), ['automotor' => 'id_automotor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenAutomotors()
    {
        return $this->hasMany(OrdenAutomotor::className(), ['id_automotor' => 'id_automotor']);
    }
}
