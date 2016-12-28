<?php

namespace kupi_othodov_ru\module_catalog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use kupi_othodov_ru\module_catalog\models\CatalogOption;

/**
 * CatalogOptionSearch represents the model behind the search form about `kupi_othodov_ru\module_catalog\models\CatalogOption`.
 */
class CatalogOptionSearch extends CatalogOption
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_group', 'active', 'priority', 'in_filter', 'required'], 'integer'],
            [['code', 'image', 'type', 'name', 'variants', 'default', 'description'], 'safe'],
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
        $query = CatalogOption::find();

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
            'id_group' => $this->id_group,
            'active' => $this->active,
            'priority' => $this->priority,
            'in_filter' => $this->in_filter,
            'required' => $this->required,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'variants', $this->variants])
            ->andFilterWhere(['like', 'default', $this->default])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
