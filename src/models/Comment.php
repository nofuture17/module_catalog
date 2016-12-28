<?php

namespace kupi_othodov_ru\module_catalog\models;

use Yii;

/**
 * This is the model class for table "{{%catalog_comment}}".
 *
 * @property string $text
 * @property integer $id_item
 * @property integer $id_owner
 * @property integer $id_parent
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $id
 * @property integer $active
 * @property integer $priority
 */
class Comment extends \amd_php_dev\yii2_components\models\comment\Comment
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%catalog_comment}}';
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
            [['text'], 'string'],
            [['id_item', 'id_owner', 'id_parent', 'created_at', 'updated_at', 'active', 'priority'], 'integer'],
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
     * @return CommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentQuery(get_called_class());
    }

    /**
     * @return CommentOwner the active query used by this AR class.
     */
    public function getOwnerRelation()
    {
        $this->hasOne(CommentOwner::className(), ['id' => 'id_owner']);
    }

    /**
     * @return CommentLikeQuery
     */
    public function getLikesRelation()
    {
        $this->hasMany(CommentLike::className(), ['id_comment' => 'id']);
    }

    /**
     * @return Catalog
     */
    public function getItemRelation()
    {
        $this->hasOne(Catalog::className(), ['id' => 'id_item']);
    }

    /**
     * @return Comment
     */
    public function getParentRelation()
    {
        $this->hasOne(Comment::className(), ['id' => 'id_parent']);
    }
}
