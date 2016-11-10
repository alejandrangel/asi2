<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Estado".
 *
 * @property integer $id_estado
 * @property string $estado
 * @property string $descripcion
 * @property integer $id_tabla
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estado'], 'required'],
            [['id_estado', 'id_tabla'], 'integer'],
            [['estado', 'descripcion'], 'string', 'max' => 45],
            [['id_tabla'], 'exist', 'skipOnError' => true, 'targetClass' => CatalogoTabla::className(), 'targetAttribute' => ['id_tabla' => 'id_catalogo_tabla']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estado' => 'Id Estado',
            'estado' => 'Estado',
            'descripcion' => 'Descripcion',
            'id_tabla' => 'Id Tabla',
        ];
    }
}
