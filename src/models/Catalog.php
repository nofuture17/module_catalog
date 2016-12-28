<?php

namespace app\modules\catalog\models;

use amd_php_dev\yii2_components\behaviors\nestedsets\NestedSetsBehavior;
use amd_php_dev\yii2_components\widgets\form\SmartInput;
use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%catalog_catalog}}".
 *
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property integer $id
 * @property integer $id_parent
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
class Catalog extends \amd_php_dev\yii2_components\models\Page
{
    const IMAGES_URL_ALIAS = '@web/data/catalog/images/all/';

    const ATTR_OPTIONS = 'optionValues';
    const ATTR_MANUFACTURES = 'manufactures';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%catalog_catalog}}';
    }

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
            'nestedCategory' => [
                'class' => NestedSetsBehavior::className(),
            ],
            'optionsManager' => [
                'class' => \amd_php_dev\yii2_components\behaviors\OptionBehavior::className(),
                'setableAttribute' => static::ATTR_OPTIONS,
                'optionsRelation' => 'optionsRelation',
                'optionValuesRelation' => 'optionValuesRelation',
                'optionGroupsRelation' => 'optionGroupsRelation',
            ],
            'manufacturesManager' => [
                'class' => \amd_php_dev\yii2_components\behaviors\taggable\TaggableBehavior::className(),
                'tagRelation' => 'manufacturesRelation',
                'tagValueAttribute' => 'id',
                'tagValueType' => 'id',
                'tagFrequencyAttribute' => false,
                'tagValuesAttribute' => static::ATTR_MANUFACTURES,
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
            return '#';

        $item = null;
        $parent = null;
        if ($this->depth > 0) {
            $item = $this->url;
            if ($this->depth > 1) {
                $parentItem = $this->getFirstParent();
                $parent = !empty($parentItem) ? $parentItem->url : null;
            }
        }

        return Url::to(['/catalog/default/index', 'item' => $item, 'parent' => $parent]);
    }

    public function getFirstParent()
    {
        return $this->parents()->andWhere('depth != 0')->addOrderBy('depth ASC')->one();
    }

    public function getBreadcrumbsItems()
    {
        return $this->parents()
            ->addOrderBy('id DESC')
            ->all();
    }

    public function getChildren()
    {
        return $this->children(1)->defaultScope()->defaultSort()->all();
    }

    /**
    * @inheritdoc
    */
    public function getInputType($attribute)
    {
        $result = null;

        switch ($attribute) {
            case 'id_parent' :
                if ($this->id_parent === 0) {
                    $result = SmartInput::TYPE_HIDDEN;
                } else {
                    $result = SmartInput::TYPE_SELECT;
                }
                break;
            case static::ATTR_MANUFACTURES :
                $result = SmartInput::TYPE_CATEGORIES;
                break;
            case static::ATTR_OPTIONS :
                $result = SmartInput::TYPE_OPTIONS;
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
            case 'id_parent' :
                $result = [];
                $query = static::find();
                if (!$this->isNewRecord) {
                    $query->andWhere('id != ' . (int) $this->id);
                }
                $data = $query->asArray()->all();

                foreach ($data as $item) {
                    $result[$item['id']] = $item['id'] . ' - ' . $item['name'];
                }
                break;
            case static::ATTR_MANUFACTURES :
                $result = [];
                $data = $this->getManufacturesRelation()->clean()->asArray()->all();
                foreach ($data as $item) {
                    $result[$item['id']] = $item['id'] . ' - ' . $item['name'];
                }
                break;
            case static::ATTR_OPTIONS :
                $result = $result = $this->getBehavior('optionsManager');
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
        return \yii\helpers\ArrayHelper::merge(parent::rules(), [
            [['lft', 'rgt', 'depth', 'id_parent'], 'integer'],
            [['id_parent'], 'required'],
            [['url'], 'unique'],
            [[static::ATTR_OPTIONS, static::ATTR_MANUFACTURES], 'safe'],
        ]);
        /*return [
            [['lft', 'rgt', 'depth', 'active', 'priority', 'created_at', 'updated_at', 'author'], 'integer'],
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
            'id_parent' => 'Родитель',
            static::ATTR_MANUFACTURES => 'Производство',
            static::ATTR_OPTIONS => 'Характеристики',
        ]);
    }

    /**
     * @inheritdoc
     * @return CatalogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CatalogQuery(get_called_class());
    }

    /**
     * @return CommentQuery
     */
    public function getCommentsRelation()
    {
        $this->hasMany(Comment::className(), ['id_item' => 'id']);
    }

    /**
     * @return ManufactureQuery
     */
    public function getManufacturesRelation()
    {
        return $this->hasMany(
            Manufacture::className(), ['id' => 'id_related'])
            ->viaTable('{{%catalog_manufacture_to_catalog}}', ['id_item' => 'id']);
    }

    /**
     * @return \amd_php_dev\yii2_components\models\PageQuery
     */
    public function getOptionGroupsRelation()
    {
        return CatalogOptionGroup::find()
            ->defaultScope()
            ->defaultSort()
            ->indexBy('id');
    }

    /**
     * @return \yii\db\Query
     */
    public function getOptionValuesRelation()
    {
        $query = new \yii\db\Query();
        return $query->select('*')
            ->from('{{%catalog_catalog_option_value}}')
            ->where('id_item = ' . (int) $this->id)
            ->indexBy('id_option');
    }

    /**
     * @return \amd_php_dev\yii2_components\models\OptionQuery
     */
    public function getOptionsRelation()
    {
        return CatalogOption::find()
            ->defaultScope()
            ->defaultSort()
            ->indexBy('id');
    }
}
