<?php

namespace app\models;

use Yii;
use yii\web\Session;

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
 * @property Empleado $idEmpleado
 * @property UsuarioRol[] $usuarioRols
 * @property Rol[] $idRols
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	
	const ACTIVO 	= 'A';
	const BLOQUEADO = 'B';
	
	public $data = 1;
	
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
            //[['clave'], 'string', 'max' => 255],
            [['clave'], 'match', 'pattern' => "/^.{8,16}$/"],
            [['nombre'], 'unique'],
            [['id_empleado'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['id_empleado' => 'id_empleado']],
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
        return $this->hasMany(LogUser::className(), ['usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado()
    {
        return $this->hasOne(Employee::className(), ['id_empleado' => 'id_empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioRols()
    {
        return $this->hasMany(UserRol::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRols()
    {
        return $this->hasMany(Rol::className(), ['id_rol' => 'id_rol'])->viaTable('usuario_rol', ['id_usuario' => 'id_usuario']);
    }
    
    /*
     * SECURITY
     * */
    
    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
    	return static::findOne($id);
    }
    
    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    	
    }
    
    /**
     * @return int|string current user ID
     */
    public function getId()
    {
    	return $this->id_usuario;
    }
    
    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
    	//return $this->auth_key;
    }
    
    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
    	return $this->getAuthKey() === $authKey;
    }
    
    
    public static function findByUserName($userName){
    	return static::findOne(['nombre'=>$userName,'estado'=>User::ACTIVO]);
    }
    
    
    public function validatePassword($password){
    	return (md5($password) === $this->clave);
    }


    public function getRoles()
    {
            return Rol::find()->
            leftJoin('usuario_rol','rol.id_rol = usuario_rol.id_rol')->
            where(['usuario_rol.id_usuario'=>$this->id_usuario,'rol.activo'=>'1'])->
            all();
    }


    public function beforeSave($param) {
        if(strlen($this->clave)>0) {
            $pass = md5($this->clave);
            $this->clave = $pass;
        }
        return true;
    }
}
