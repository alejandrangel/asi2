<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_usuario".
 *
 * @property integer $id_log
 * @property integer $usuario
 * @property string $fecha
 * @property string $accion
 *
 * @property Usuario $usuario0
 */
class LogUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario', 'accion'], 'required'],
            [['usuario'], 'integer'],
            [['fecha'], 'safe'],
            [['accion'], 'string', 'max' => 500],
            [['usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_log' => 'Id Log',
            'usuario' => 'Usuario',
            'fecha' => 'Fecha',
            'accion' => 'Accion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario0()
    {
        return $this->hasOne(User::className(), ['id_usuario' => 'usuario']);
    }
}
