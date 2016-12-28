<?php

namespace kupi_othodov_ru\module_catalog\models;

use Yii;

/**
 * This is the model class for table "{{%catalog_comment_owner}}".
 *
 * @property string $name
 * @property string $image
 * @property string $ip
 * @property string $email
 * @property integer $id
 * @property integer $active
 * @property integer $priority
 */
class CommentOwner extends \amd_php_dev\yii2_components\models\comment\CommentOwner
{
    const IMAGES_URL_ALIAS = '@web/data/catalog/comment/images/all/';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%catalog_comment_owner}}';
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
            [['active', 'priority'], 'integer'],
            [['name', 'image', 'ip', 'email'], 'string', 'max' => 255],
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
     * @return CommentOwnerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentOwnerQuery(get_called_class());
    }

    /**
     * @return CommentQuery
     */
    public function getCommentsRelation()
    {
        $this->hasMany(Comment::className(), ['id_owner' => 'id']);
    }

    /**
     * @return CommentLikeQuery
     */
    public function getLikesRelation()
    {
        $this->hasMany(CommentLike::className(), ['id_owner' => 'id']);
    }
}
