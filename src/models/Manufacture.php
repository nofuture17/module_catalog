<?php

namespace kupi_othodov_ru\module_catalog\models;

use amd_php_dev\yii2_components\widgets\form\SmartInput;
use Yii;

/**
 * This is the model class for table "{{%catalog_manufacture}}".
 *
 * @property integer $id
 * @property integer $active
 * @property integer $priority
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $author
 * @property string $name
 * @property string $name_small
 * @property string $url
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $text_small
 * @property string $text_full
 * @property string $links
 * @property string $snipets
 * @property string $image_small
 * @property string $image_full
 */
class Manufacture extends \amd_php_dev\yii2_components\models\Page
{
    const IMAGES_URL_ALIAS = '@web/data/catalog/manufacture/images/all/';

    const ATTR_CATALOGS = 'catalogs';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%catalog_manufacture}}';
    }

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
            'catalogsManager' => [
                'class' => \amd_php_dev\yii2_components\behaviors\taggable\TaggableBehavior::className(),
                'tagRelation' => 'catalogsRelation',
                'tagValueAttribute' => 'id',
                'tagValueType' => 'id',
                'tagFrequencyAttribute' => false,
                'tagValuesAttribute' => static::ATTR_CATALOGS,
            ],
        ]);
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
            case self::ATTR_CATALOGS :
                $result = SmartInput::TYPE_CATEGORIES;
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
            case self::ATTR_CATALOGS :
                $result = [];
                $query = Catalog::find();
                $query->andWhere('id_parent != 0');
                $data = $query->asArray()->all();

                foreach ($data as $item) {
                    $result[$item['id']] = $item['id'] . ' - ' . $item['name'];
                }
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


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at', 'author'], 'integer'],
            [['text_small', 'text_full', 'links', 'snipets'], 'string'],
            [['name', 'name_small', 'url', 'meta_title', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
//            [['url'], \amd_php_dev\yii2_components\validators\AutoUniqueValidator::className()],
            [[static::ATTR_CATALOGS], 'safe'],

            ['active', 'integer'],
            ['active', 'default', 'value' => static::ACTIVE_WAIT],
            ['active', 'in', 'range' => array_keys(static::getActiveArray())],

            ['priority', 'integer'],
            ['priority', 'default', 'value' => 100],

            [['image_small', 'image_full'], 'safe'],
            ['image_small', 'file', 'extensions' => 'jpeg, jpg, gif, png'],
            ['image_full', 'file', 'extensions' => 'jpeg, jpg, gif, png'],
        ];

        /*return [
            [['active', 'priority', 'created_at', 'updated_at', 'author'], 'integer'],
            [['text_small', 'text_full', 'links', 'snipets'], 'string'],
            [['name', 'name_small', 'url', 'meta_title', 'meta_keywords', 'meta_description', 'image_small', 'image_full'], 'string', 'max' => 255],
        ];*/
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return \yii\helpers\ArrayHelper::merge(parent::attributeLabels(), [
            self::ATTR_CATALOGS => 'Каталоги',
        ]);
    }

    /**
     * @inheritdoc
     * @return ManufactureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ManufactureQuery(get_called_class());
    }

    /**
     * @return ManufactureQuery
     */
    public function getCatalogsRelation()
    {
        return $this->hasMany(
            Catalog::className(), ['id' => 'id_item'])
            ->viaTable('{{%catalog_manufacture_to_catalog}}', ['id_related' => 'id']);
    }
}
