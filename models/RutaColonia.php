<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ruta_colonia".
 *
 * @property integer $id_ruta_colonia
 * @property integer $id_ruta
 * @property integer $id_colonia
 * @property integer $orden
 *
 * @property Colonia $colonia
 * @property Ruta $ruta
 */
class RutaColonia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ruta_colonia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ruta_colonia', 'id_ruta', 'id_colonia'], 'required'],
            [['id_ruta_colonia', 'id_ruta', 'id_colonia', 'orden'], 'integer'],
            [['id_colonia'], 'exist', 'skipOnError' => true, 'targetClass' => Colonia::className(), 'targetAttribute' => ['id_colonia' => 'id_colonia']],
            [['id_ruta'], 'exist', 'skipOnError' => true, 'targetClass' => Ruta::className(), 'targetAttribute' => ['id_ruta' => 'id_ruta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ruta_colonia' => 'Id Ruta Colonia',
            'id_ruta' => 'Ruta',
            'id_colonia' => 'Colonia',
            'orden' => 'Orden',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColonia()
    {
        return $this->hasOne(Colonia::className(), ['id_colonia' => 'id_colonia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuta()
    {
        return $this->hasOne(Ruta::className(), ['id_ruta' => 'id_ruta']);
    }
}
