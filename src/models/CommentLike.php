<?php

namespace app\modules\catalog\models;

use Yii;

/**
 * This is the model class for table "{{%catalog_comment_like}}".
 *
 * @property integer $id_owner
 * @property integer $id_comment
 * @property integer $id
 * @property integer $active
 * @property integer $priority
 */
class CommentLike extends \amd_php_dev\yii2_components\models\comment\CommentLike
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%catalog_comment_like}}';
    }

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        //return \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
        //
        //]);
        return parent::behaviors();
    }

    /**
    * @inheritdoc
    */
    public static function getActiveArray()
    {
        //return \yii\helpers\ArrayHelper::merge(parent::getActiveArray(), [
        //
        //]);
        return parent::getActiveArray();
    }

    /**
    * @inheritdoc
    */
    public function getItemUrl() {
        if ($this->isNewRecord)
            return false;

        //return Url::to(['', 'url' => $this->url]);
        return '';
    }

    /**
    * @inheritdoc
    */
    public function getInputType($attribute)
    {
        $result = null;

        switch ($attribute) {
            default:
                $result = parent::getInputType($attribute);
        }

        return $result;
    }

    /**
    * @inheritdoc
    */
    public function getInputData($attribute)
    {
        $result = null;

        switch ($attribute) {
            default:
                $result = parent::getInputData($attribute);
        }

        return $result;
    }

    /**
    * @inheritdoc
    */
    public function getInputOptions($attribute)
    {
        $result = null;

        switch ($attribute) {
            default:
                $result = parent::getInputOptions($attribute);
        }

        return $result;
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        //return \yii\helpers\ArrayHelper::merge(parent::rules(), [
        //
        //]);
        return parent::rules();
        /*return [
            [['id_owner', 'id_comment', 'active', 'priority'], 'integer'],
        ];*/
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        //return \yii\helpers\ArrayHelper::merge(parent::attributeLabels(), [
        //
        //]);
        return parent::attributeLabels();
    }

    /**
     * @inheritdoc
     * @return CommentLikeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentLikeQuery(get_called_class());
    }

    /**
     * @return CommentOwner the active query used by this AR class.
     */
    public function getOwnerRelation()
    {
        $this->hasOne(CommentOwner::className(), ['id' => 'id_owner']);
    }

    /**
     * @return Comment the active query used by this AR class.
     */
    public function getCommnetRelation()
    {
        $this->hasOne(Comment::className(), ['id' => 'id_comment']);
    }
}
