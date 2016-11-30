<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accesos".
 *
 * @property integer $id_rol
 * @property integer $id_usuario
 * @property integer $id_menu
 * @property integer $id_parent
 * @property string $label
 * @property string $url
 */
class Accesos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accesos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rol', 'id_usuario', 'id_menu', 'label', 'url'], 'required'],
            [['id_rol', 'id_usuario', 'id_menu', 'id_parent'], 'integer'],
            [['label'], 'string', 'max' => 45],
            [['url'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rol' => 'Id Rol',
            'id_usuario' => 'Id Usuario',
            'id_menu' => 'Id Menu',
            'id_parent' => 'Id Parent',
            'label' => 'Label',
            'url' => 'Url',
        ];
    }
	
	
	 public static function HasAccess($id,$ruta)
    {
       if (Accesos::findOne(['id_usuario' => $id, 'url' => $ruta])){
        return true;
       } else {

        return false;
       }

    }
	
	
}
