<?php

namespace app\modules\catalog\models;

/**
 * This is the ActiveQuery class for [[Comment]].
 *
 * @see Comment
 */
class CommentQuery extends \amd_php_dev\yii2_components\models\comment\CommentQuery
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
     * @return Comment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Comment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
