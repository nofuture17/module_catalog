<?php

namespace kupi_othodov_ru\module_catalog\models;

/**
 * This is the ActiveQuery class for [[CatalogOptionGroup]].
 *
 * @see CatalogOptionGroup
 */
class CatalogOptionGroupQuery extends \amd_php_dev\yii2_components\models\OptionGroupQuery
{

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        //return ArrayHelper::merge(parent::behaviors(), [
        //
        //]);
        return parent::behaviors();
    }

    /**
     * @inheritdoc
     * @return CatalogOptionGroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CatalogOptionGroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
