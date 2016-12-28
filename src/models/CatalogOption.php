<?php

namespace kupi_othodov_ru\module_catalog\models;

use amd_php_dev\yii2_components\widgets\form\SmartInput;
use Yii;

/**
 * This is the model class for table "{{%catalog_catalog_option}}".
 *
 * @property integer $id
 * @property integer $id_group
 * @property integer $active
 * @property integer $priority
 * @property integer $in_filter
 * @property integer $required
 * @property string $code
 * @property string $image
 * @property string $type
 * @property string $name
 * @property string $variants
 * @property string $default
 * @property string $description
 */
class CatalogOption extends \amd_php_dev\yii2_components\models\Option
{
    const IMAGES_URL_ALIAS = '@web/data/catalog/option/images/all/';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%catalog_catalog_option}}';
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
            case 'id_group' :
                $result = SmartInput::TYPE_SELECT;
                break;
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
            case 'id_group' :
                $result = $this->getInputDataIdGroup();
                break;
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

    public function getInputDataIdGroup()
    {
        $result = ['0' => 'Без группы'];

        $data = $this->getGroupRelation()->clean()->asArray()->all();

        foreach ($data as $item) {
            $result[$item['id']] = $item['id'] . ' - ' . $item['name'];
        }

        return $result;
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return \yii\helpers\ArrayHelper::merge(parent::rules(), [
            [['id_group'], 'integer']
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return \yii\helpers\ArrayHelper::merge(parent::attributeLabels(), [
            'id_group' => 'Группа характеристик',
        ]);
    }

    /**
     * @inheritdoc
     * @return CatalogOptionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CatalogOptionQuery(get_called_class());
    }

    public function getGroupRelation()
    {
        return $this->hasOne(
            CatalogOptionGroup::className(),
            ['id' => 'id_group']
        );
    }
}
