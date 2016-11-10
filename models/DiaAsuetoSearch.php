<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DiaAsueto;

/**
 * DiaAsuetoSearch represents the model behind the search form about `app\models\DiaAsueto`.
 */
class DiaAsuetoSearch extends DiaAsueto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dia_asueto', 'plan'], 'integer'],
            [['fecha'], 'safe'],
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
        $query = DiaAsueto::find();

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
            'id_dia_asueto' => $this->id_dia_asueto,
            'fecha' => $this->fecha,
            'plan' => $this->plan,
        ]);

        return $dataProvider;
    }
}
