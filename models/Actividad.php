<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Actividad".
 *
 * @property integer $id_actividad
 * @property string $actividad
 */
class Actividad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Actividad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actividad'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_actividad' => 'Id Actividad',
            'actividad' => 'Actividad',
        ];
    }
}
