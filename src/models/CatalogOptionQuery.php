<?php

namespace app\modules\catalog\models;

/**
 * This is the ActiveQuery class for [[CatalogOption]].
 *
 * @see CatalogOption
 */
class CatalogOptionQuery extends \amd_php_dev\yii2_components\models\OptionQuery
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
     * @return CatalogOption[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CatalogOption|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
