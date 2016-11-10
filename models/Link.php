<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "link".
 *
 * @property integer $id_link
 * @property string $url
 * @property integer $menu
 *
 * @property Menu $menu0
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_link'], 'required'],
            [['id_link', 'menu'], 'integer'],
            [['url'], 'string', 'max' => 500],
            [['menu'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['menu' => 'id_menu']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_link' => 'Id Link',
            'url' => 'Url',
            'menu' => 'Menu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu0()
    {
        return $this->hasOne(Menu::className(), ['id_menu' => 'menu']);
    }
}
