<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Fuente".
 *
 * @property integer $id_fuente
 * @property string $fuente
 */
class Fuente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fuente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fuente'], 'required'],
            [['id_fuente'], 'integer'],
            [['fuente'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fuente' => 'Id Fuente',
            'fuente' => 'Fuente',
        ];
    }
}
