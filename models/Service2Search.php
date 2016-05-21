<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\service2;

/**
 * Service2Search represents the model behind the search form about `app\models\service2`.
 */
class Service2Search extends service2
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['photo', 'dob', 'gender', 'mar_status', 'address', 'hobbies', 'inter_zone', 'id_docu', 'id_upload', 'lang_1', 'lang_2', 'lang_3', 'category', 'phy_chal', 'phy_chal_des'], 'safe'],
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
        $query = service2::find();

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
        ]);

        $query->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'dob', $this->dob])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'mar_status', $this->mar_status])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'hobbies', $this->hobbies])
            ->andFilterWhere(['like', 'inter_zone', $this->inter_zone])
            ->andFilterWhere(['like', 'id_docu', $this->id_docu])
            ->andFilterWhere(['like', 'id_upload', $this->id_upload])
            ->andFilterWhere(['like', 'lang_1', $this->lang_1])
            ->andFilterWhere(['like', 'lang_2', $this->lang_2])
            ->andFilterWhere(['like', 'lang_3', $this->lang_3])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'phy_chal', $this->phy_chal])
            ->andFilterWhere(['like', 'phy_chal_des', $this->phy_chal_des]);

        return $dataProvider;
    }
}
