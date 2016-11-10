<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orden_automotor".
 *
 * @property string $km_inicial
 * @property string $km_final
 * @property string $codigo_vale
 * @property string $monto
 * @property integer $id_orden
 * @property integer $id_automotor
 * @property Automotor $idAutomotor
 * @property OrdenTrabajo $idOrden
 */
class OrdenAutomotor extends \yii\db\ActiveRecord
{


    public $edit = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orden_automotor';
    }

    public static function primaryKey(){
        return array('id_orden', 'id_automotor');
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['monto'], 'number'],
            [['id_orden', 'id_automotor'], 'required'],
            [['id_orden', 'id_automotor'], 'integer'],
            [['km_inicial', 'km_final', 'codigo_vale'], 'string', 'max' => 45],
            [['id_automotor'], 'exist', 'skipOnError' => true, 'targetClass' => Automotor::className(), 'targetAttribute' => ['id_automotor' => 'id_automotor']],
            [['id_orden'], 'exist', 'skipOnError' => true, 'targetClass' => OrdenTrabajo::className(), 'targetAttribute' => ['id_orden' => 'id_orden_trabajo']],
            [['id_automotor'],'alreadyExist']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'km_inicial' => 'Km Inicial',
            'km_final' => 'Km Final',
            'codigo_vale' => 'Codigo Vale',
            'monto' => 'Monto',
            'id_orden' => 'Orden',
            'id_automotor' => 'Automotor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAutomotor()
    {
        return $this->hasOne(Automotor::className(), ['id_automotor' => 'id_automotor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrden()
    {
        return $this->hasOne(OrdenTrabajo::className(), ['id_orden_trabajo' => 'id_orden']);
    }

    public function alreadyExist($attribute,$params){
        if($this->edit){
            return;
        }
        if(OrdenAutomotor::find()->where(
            [
                'id_orden'=>$this->id_orden,
                'id_automotor'=>$this->id_automotor
            ]
        )->asArray()->all()){
            $this->addError($attribute, 'Ya fue almacenado');
        }
    }

}
