<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Sportbuilding;

/**
 * SportbuildingSearch represents the model behind the search form about `app\modules\admin\models\Sportbuilding`.
 */
class SportbuildingSearch extends Sportbuilding
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sportbuilding_id', 'published'], 'integer'],
            [['full_title', 'alias', 'work_hours', 'phone', 'address', 'email', 'updated_on'], 'safe'],
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
        $query = Sportbuilding::find();

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
            'sportbuilding_id' => $this->sportbuilding_id,
            'published' => $this->published,
            'updated_on' => $this->updated_on,
        ]);

        $query->andFilterWhere(['like', 'full_title', $this->full_title])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'work_hours', $this->work_hours])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
