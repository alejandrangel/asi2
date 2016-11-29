<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipo_automotor".
 *
 * @property integer $id_automor
 * @property integer $id_equipo
 *
 * @property Automotor $idAutomor
 * @property Equipo $idEquipo
 */
class EquipoAutomotor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipo_automotor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_automor', 'id_equipo'], 'required'],
            [['id_automor', 'id_equipo'], 'integer'],
            [['id_automor'], 'exist', 'skipOnError' => true, 'targetClass' => Automotor::className(), 'targetAttribute' => ['id_automor' => 'id_automotor']],
            [['id_equipo'], 'exist', 'skipOnError' => true, 'targetClass' => Equipo::className(), 'targetAttribute' => ['id_equipo' => 'id_equipo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_automor' => 'Id Automor',
            'id_equipo' => 'Id Equipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAutomor()
    {
        return $this->hasOne(Automotor::className(), ['id_automotor' => 'id_automor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEquipo()
    {
        return $this->hasOne(Equipo::className(), ['id_equipo' => 'id_equipo']);
    }
}
