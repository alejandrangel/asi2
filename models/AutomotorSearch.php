<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Automotor;

/**
 * AutomotorSearch represents the model behind the search form about `app\models\Automotor`.
 */
class AutomotorSearch extends Automotor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_automotor', 'modelo', 'anio', 'tipo', 'estado', 'color', 'combustible'], 'integer'],
            [['placa', 'capacidad', 'chasis', 'numero_motor'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Automotor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_automotor' => $this->id_automotor,
            'modelo' => $this->modelo,
            'anio' => $this->anio,
            'tipo' => $this->tipo,
            'estado' => $this->estado,
            'color' => $this->color,
            'combustible' => $this->combustible,
        ]);

        $query->andFilterWhere(['like', 'placa', $this->placa])
            ->andFilterWhere(['like', 'capacidad', $this->capacidad])
            ->andFilterWhere(['like', 'chasis', $this->chasis])
            ->andFilterWhere(['like', 'numero_motor', $this->numero_motor]);

        return $dataProvider;
    }
}
