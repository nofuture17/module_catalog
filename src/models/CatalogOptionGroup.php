<?php

namespace app\modules\catalog\models;

use Yii;

/**
 * This is the model class for table "{{%catalog_catalog_option_group}}".
 *
 * @property integer $id
 * @property integer $active
 * @property integer $priority
 * @property integer $id_parent
 * @property string $code
 * @property string $image
 * @property string $name
 */
class CatalogOptionGroup extends \amd_php_dev\yii2_components\models\OptionGroup
{
    const IMAGES_URL_ALIAS = '@web/data/catalog/option_group/images/all/';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%catalog_catalog_option_group}}';
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
            [['active', 'priority', 'id_parent'], 'integer'],
            [['code', 'image', 'name'], 'string', 'max' => 255],
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
     * @return CatalogOptionGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CatalogOptionGroupQuery(get_called_class());
    }

    public function getOptionsRelation()
    {
        return $this->hasMany(
            CatalogOption::className(),
            ['id_group' => 'id']
        );
    }
}
