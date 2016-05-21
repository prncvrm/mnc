<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\service1;

/**
 * ServiceSearch represents the model behind the search form about `app\models\service1`.
 */
class ServiceSearch extends service1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'contact', 'exp_year'], 'integer'],
            [['email_id', 'password_hash', 'password_reset_token', 'name', 'location', 'key_skill', 'education', 'resume'], 'safe'],
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
        $query = service1::find();

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
            'contact' => $this->contact,
            'exp_year' => $this->exp_year,
        ]);

        $query->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'key_skill', $this->key_skill])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'resume', $this->resume]);

        return $dataProvider;
    }
}
