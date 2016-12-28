<?php

namespace kupi_othodov_ru\module_catalog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use kupi_othodov_ru\module_catalog\models\CatalogOptionGroup;

/**
 * CatalogOptionGroupSearch represents the model behind the search form about `kupi_othodov_ru\module_catalog\models\CatalogOptionGroup`.
 */
class CatalogOptionGroupSearch extends CatalogOptionGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'active', 'priority', 'id_parent'], 'integer'],
            [['code', 'image', 'name'], 'safe'],
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
        $query = CatalogOptionGroup::find();

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
            'active' => $this->active,
            'priority' => $this->priority,
            'id_parent' => $this->id_parent,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
