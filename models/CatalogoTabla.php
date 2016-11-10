<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalogo_tabla".
 *
 * @property integer $id_catalogo_tabla
 * @property string $nombre
 *
 * @property Estado[] $estados
 */
class CatalogoTabla extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalogo_tabla';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_catalogo_tabla'], 'required'],
            [['id_catalogo_tabla'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_catalogo_tabla' => 'Id Catalogo Tabla',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstados()
    {
        return $this->hasMany(Estado::className(), ['id_tabla' => 'id_catalogo_tabla']);
    }
}
