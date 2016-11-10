<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $clave
 * @property string $fecha_creacion
 * @property string $estado
 * @property integer $id_empleado
 *
 * @property LogUsuario[] $logUsuarios
 * @property Empleado $empleado
 * @property UsuarioRol[] $usuarioRols
 * @property Rol[] $rols
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'clave', 'id_empleado'], 'required'],
            [['fecha_creacion'], 'safe'],
            [['estado'], 'string'],
            [['id_empleado'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['clave'], 'string', 'min' => 6],
           // [['clave'], 'match', 'pattern' => "/^.{6,16}$/",'min' => 6],
            [['nombre'], 'unique'],
            [['id_empleado'], 'exist', 'skipOnError' => true, 'targetClass' => Empleado::className(), 'targetAttribute' => ['id_empleado' => 'id_empleado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'nombre' => 'Nombre',
            'clave' => 'Clave',
            'fecha_creacion' => 'Fecha Creacion',
            'estado' => 'Estado',
            'id_empleado' => 'Id Empleado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogUsuarios()
    {
        return $this->hasMany(LogUsuario::className(), ['usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleado()
    {
        return $this->hasOne(Empleado::className(), ['id_empleado' => 'id_empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioRols()
    {
        return $this->hasMany(UsuarioRol::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRols()
    {
        return $this->hasMany(Rol::className(), ['id_rol' => 'id_rol'])->viaTable('usuario_rol', ['id_usuario' => 'id_usuario']);
    }


    public function beforeSave($param) {
        if(strlen($this->clave)>0) {
            $pass = md5($this->clave);
            $this->clave = $pass;
        }
        return true;
    }

}
