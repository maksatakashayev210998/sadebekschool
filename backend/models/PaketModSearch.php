<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PaketMod;

/**
 * PaketModSearch represents the model behind the search form of `backend\models\PaketMod`.
 */
class PaketModSearch extends PaketMod
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'paket_id', 'modul_id'], 'integer'],
            [['namepaket', 'namemod'], 'safe'],

        ];
    }

    /**
     * {@inheritdoc}
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
        $query = PaketMod::find();

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
        $query->joinWith('postsPost');
        $query->joinWith('postssPost');


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'paket_id' => $this->paket_id,
            'modul_id' => $this->modul_id,
            'namepaket' => $this->paket_id,
            'namemod' => $this->modul_id,

        ]);

        $query->andFilterWhere(['like', 'paket.name', $this->namepaket])
            ->andFilterWhere(['like', 'modul.name', $this->namemod]);

        return $dataProvider;
    }
}
