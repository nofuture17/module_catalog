<?php

namespace app\modules\catalog\models;

/**
 * This is the ActiveQuery class for [[Manufacture]].
 *
 * @see Manufacture
 */
class ManufactureQuery extends \amd_php_dev\yii2_components\models\PageQuery
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
     * @return Manufacture[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Manufacture|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
