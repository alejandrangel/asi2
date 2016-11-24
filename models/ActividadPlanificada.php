<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actividad_planificada".
 *
 * @property integer $id_actividad_planificacion
 * @property string $tipo
 * @property string $fecha_inicio
 * @property string $fecha_final
 * @property string $periodicidad
 * @property string $dias
 * @property integer $id_plan
 * @property integer $id_ruta
 * @property integer $actividad
 *
 * @property Ruta $idRuta
 * @property Actividad $actividad0
 * @property Plan $idPlan
 */
class ActividadPlanificada extends \yii\db\ActiveRecord
{


    public $lu;
    public $ma;
    public $mi;
    public $ju;
    public $vi;
    public $sa;
    public $do;
    public $to;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actividad_planificada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {



        return [
        	[['tipo','fecha_inicio', 'fecha_final','id_ruta','id_actividad','id_plan'],'required',],
            [['id_plan', 'id_ruta', 'id_actividad'], 'integer'],
            [['fecha_inicio', 'fecha_final', 'periodicidad'], 'string', 'max' => 45],
            [['dias'], 'string', 'max' => 15],
            [['id_ruta'], 'exist', 'skipOnError' => false, 'targetClass' => Ruta::className(), 'targetAttribute' => ['id_ruta' => 'id_ruta']],
            [['id_actividad'], 'exist', 'skipOnError' => false, 'targetClass' => Actividad::className(), 'targetAttribute' => ['actividad' => 'id_actividad']],
            [['id_plan'], 'exist', 'skipOnError' => false, 'targetClass' => Plan::className(), 'targetAttribute' => ['id_plan' => 'id_plan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_actividad_planificacion' => 'Actividad Planificacion',
            'tipo' => 'Tipo',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_final' => 'Fecha Final',
            'periodicidad' => 'Periodicidad',
            'dias' => 'Días',
            'id_plan' => 'Plan',
            'id_ruta' => 'Ruta',
            'id_actividad' => 'Actividad',
        ];
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
    public function getActividad()
    {
        return $this->hasOne(Actividad::className(), ['id_actividad' => 'id_actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPlan()
    {
        return $this->hasOne(Plan::className(), ['id_plan' => 'id_plan']);
    }
    
    public function validateTipo($attribute, $params){
    	$this->addError('tipo', 'Seleccione la periodicidad');
    	if($this->tipo == 'P'){
    		if(empty($this->periodicidad)){
    			
    			
    		}
    	}
    }
}
