<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "colonia".
 *
 * @property integer $id_colonia
 * @property string $nombre
 * @property integer $id_distrito
 *
 * @property Distrito $distrito
 * @property RutaColonia[] $rutaColonias
 */
class Colonia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'colonia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'id_distrito'], 'required'],
            [['id_distrito'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
            [['nombre'], 'unique'],
            [['id_distrito'], 'exist', 'skipOnError' => true, 'targetClass' => Distrito::className(), 'targetAttribute' => ['id_distrito' => 'id_distrito']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_colonia' => 'Id Colonia',
            'nombre' => 'Nombre',
            'id_distrito' => 'Id Distrito',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrito()
    {
        return $this->hasOne(Distrito::className(), ['id_distrito' => 'id_distrito']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutaColonias()
    {
        return $this->hasMany(RutaColonia::className(), ['id_colonia' => 'id_colonia']);
    }
}
