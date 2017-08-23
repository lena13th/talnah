<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Page;

/**
 * PageSearch represents the model behind the search form about `app\modules\admin\models\Page`.
 */
class PageSearch extends Page
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'published'], 'integer'],
            [['title', 'full_title', 'alias', 'content', 'parent_alias', 'meta_keywords', 'meta_description', 'updated_on'], 'safe'],
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
    public function search($params,$parent_alias)
    {
//        if ($grf=='sportbuilding') {
//            $query = Page::find()->with('sportbuilding')->where(['parent_alias' => $parent_alias]);
//        }
//        else {
            $query = Page::find()->where(['parent_alias' => $parent_alias])->andWhere('alias != :alias', ['alias'=>'vacancies'])->andWhere('alias != :alias1', ['alias1'=>'contacts']);
//        }
//echo $qqqq;
        // add conditions that should always apply here
//        ->where(['published' => 1])->andWhere(['alias' => $alias])->andWhere(['parent_alias' => $parent_alias])->one();
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
            'page_id' => $this->page_id,
            'published' => $this->published,
            'updated_on' => $this->updated_on,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'full_title', $this->full_title])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'parent_alias', $this->parent_alias])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description]);

        return $dataProvider;
    }
}
