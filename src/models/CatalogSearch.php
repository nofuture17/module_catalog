<?php

namespace kupi_othodov_ru\module_catalog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use kupi_othodov_ru\module_catalog\models\Catalog;

/**
 * CatalogSearch represents the model behind the search form about `kupi_othodov_ru\module_catalog\models\Catalog`.
 */
class CatalogSearch extends Catalog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lft', 'rgt', 'depth', 'id_parent', 'id', 'active', 'priority', 'created_at', 'updated_at', 'author'], 'integer'],
            [['name', 'name_small', 'url', 'meta_title', 'meta_keywords', 'meta_description', 'text_small', 'text_full', 'links', 'snipets', 'image_small', 'image_full'], 'safe'],
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
        $query = Catalog::find();

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
            'lft' => $this->lft,
            'rgt' => $this->rgt,
            'depth' => $this->depth,
            'id_parent' => $this->id_parent,
            'id' => $this->id,
            'active' => $this->active,
            'priority' => $this->priority,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'author' => $this->author,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'name_small', $this->name_small])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'text_small', $this->text_small])
            ->andFilterWhere(['like', 'text_full', $this->text_full])
            ->andFilterWhere(['like', 'links', $this->links])
            ->andFilterWhere(['like', 'snipets', $this->snipets])
            ->andFilterWhere(['like', 'image_small', $this->image_small])
            ->andFilterWhere(['like', 'image_full', $this->image_full]);

        return $dataProvider;
    }
}
