<?php

namespace kupi_othodov_ru\module_catalog\models;

/**
 * This is the ActiveQuery class for [[CommentOwner]].
 *
 * @see CommentOwner
 */
class CommentOwnerQuery extends \amd_php_dev\yii2_components\models\comment\CommentOwnerQuery
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
     * @return CommentOwner[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CommentOwner|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
