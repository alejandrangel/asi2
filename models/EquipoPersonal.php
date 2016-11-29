<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipo_personal".
 *
 * @property integer $id_equipo
 * @property integer $id_empleado
 * @property string $estado
 *
 * @property Empleado $idEmpleado
 * @property Equipo $idEquipo
 */
class EquipoPersonal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipo_personal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_equipo', 'id_empleado'], 'required'],
            [['id_equipo', 'id_empleado'], 'integer'],
            [['estado'], 'string'],
            [['id_empleado'], 'exist', 'skipOnError' => true, 'targetClass' => Empleado::className(), 'targetAttribute' => ['id_empleado' => 'id_empleado']],
            [['id_equipo'], 'exist', 'skipOnError' => true, 'targetClass' => Equipo::className(), 'targetAttribute' => ['id_equipo' => 'id_equipo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_equipo' => 'Id Equipo',
            'id_empleado' => 'Id Empleado',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado()
    {
        return $this->hasOne(Empleado::className(), ['id_empleado' => 'id_empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEquipo()
    {
        return $this->hasOne(Equipo::className(), ['id_equipo' => 'id_equipo']);
    }
}
