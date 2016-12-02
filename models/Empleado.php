<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Empleado".
 *
 * @property integer $id_empleado
 * @property string $nombres
 * @property string $apellidos
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $fnacimiento
 * @property integer $cargo
 */
class Empleado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombres', 'apellidos', 'fnacimiento', 'cargo'], 'required'],
            [['cargo'], 'integer'],
            [['fnacimiento'], 'safe'],
            [['nombres', 'apellidos'], 'string', 'max' => 100],
            [['direccion'], 'string', 'max' => 500],
            [['telefono', 'celular'], 'string', 'max' => 10],
            [['cargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['cargo' => 'id_cargo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'fnacimiento' => 'Fnacimiento',
            'cargo' => 'Cargo',
        ];
    }
}
