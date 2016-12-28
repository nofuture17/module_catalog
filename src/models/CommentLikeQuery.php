<?php

namespace app\modules\catalog\models;

/**
 * This is the ActiveQuery class for [[CommentLike]].
 *
 * @see CommentLike
 */
class CommentLikeQuery extends \amd_php_dev\yii2_components\models\comment\CommentLikeQuery
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
     * @return CommentLike[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CommentLike|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
