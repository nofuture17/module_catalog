<?php

namespace kupi_othodov_ru\module_catalog\models;
use amd_php_dev\yii2_components\behaviors\nestedsets\NestedSetsQueryBehavior;

/**
 * This is the ActiveQuery class for [[Catalog]].
 *
 * @see Catalog
 */
class CatalogQuery extends \amd_php_dev\yii2_components\models\PageQuery
{

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
            'nestedCategoryQuery' => [
                'class' => NestedSetsQueryBehavior::className(),
            ]
        ]);
    }

    /**
     * @inheritdoc
     * @return Catalog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Catalog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
