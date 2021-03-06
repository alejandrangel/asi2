<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Combustible".
 *
 * @property integer $id_combustible
 * @property string $combustible
 */
class Combustible extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'combustible';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['combustible'], 'required'],
            [['id_combustible'], 'integer'],
            [['combustible'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_combustible' => 'Id Combustible',
            'combustible' => 'Combustible',
        ];
    }
}
