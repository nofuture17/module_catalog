<?php

namespace kupi_othodov_ru\module_catalog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use kupi_othodov_ru\module_catalog\models\Comment;

/**
 * CommentSearch represents the model behind the search form about `kupi_othodov_ru\module_catalog\models\Comment`.
 */
class CommentSearch extends Comment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'safe'],
            [['id_item', 'id_owner', 'id_parent', 'created_at', 'updated_at', 'id', 'active', 'priority'], 'integer'],
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
        $query = Comment::find();

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
            'id_item' => $this->id_item,
            'id_owner' => $this->id_owner,
            'id_parent' => $this->id_parent,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'active' => $this->active,
            'priority' => $this->priority,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
