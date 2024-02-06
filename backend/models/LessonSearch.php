<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Lesson;

/**
 * LessonSearch represents the model behind the search form of `backend\models\Lesson`.
 */
class LessonSearch extends Lesson
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'modul_id'], 'integer'],
            [['name', 'description', 'video', 'video2', 'video3', 'file', 'file2', 'namekurs', 'nameinmodul', 'opendate'], 'safe'],
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
        $query = Lesson::find();

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


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'modul_id' => $this->modul_id,
            'inmodul_id' => $this->inmodul_id,
            'namekurs' => $this->modul_id,
            'nameinmodul' => $this->inmodul_id,

        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'video', $this->video])
            ->andFilterWhere(['like', 'video2', $this->video2])
            ->andFilterWhere(['like', 'video3', $this->video3])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'file2', $this->file2])
            ->andFilterWhere(['like', 'opendate', $this->opendate])
            ->andFilterWhere(['like', 'modul.name', $this->namekurs])
            ->andFilterWhere(['like', 'inmodul.name', $this->nameinmodul]);


        return $dataProvider;
    }
}
