<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\service3;

/**
 * Service3Search represents the model behind the search form about `app\models\service3`.
 */
class Service3Search extends service3
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'year', 'mas_year'], 'integer'],
            [['course_name', 'course_type', 'specialization', 'mas_name', 'mas_type', 'industry', 'fun_area', 'comp_name', 'designation', 'period', 'job_profile', 'des_job_loc', 'job_type', 'emp_status', 'work_usa', 'other_coun'], 'safe'],
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
        $query = service3::find();

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
            'id' => $this->id,
            'year' => $this->year,
            'mas_year' => $this->mas_year,
        ]);

        $query->andFilterWhere(['like', 'course_name', $this->course_name])
            ->andFilterWhere(['like', 'course_type', $this->course_type])
            ->andFilterWhere(['like', 'specialization', $this->specialization])
            ->andFilterWhere(['like', 'mas_name', $this->mas_name])
            ->andFilterWhere(['like', 'mas_type', $this->mas_type])
            ->andFilterWhere(['like', 'industry', $this->industry])
            ->andFilterWhere(['like', 'fun_area', $this->fun_area])
            ->andFilterWhere(['like', 'comp_name', $this->comp_name])
            ->andFilterWhere(['like', 'designation', $this->designation])
            
            ->andFilterWhere(['like', 'period', $this->period])
            ->andFilterWhere(['like', 'job_profile', $this->job_profile])
            ->andFilterWhere(['like', 'des_job_loc', $this->des_job_loc])
            ->andFilterWhere(['like', 'job_type', $this->job_type])
            ->andFilterWhere(['like', 'emp_status', $this->emp_status])
            ->andFilterWhere(['like', 'work_usa', $this->work_usa])
            ->andFilterWhere(['like', 'other_coun', $this->other_coun]);

        return $dataProvider;
    }
}
