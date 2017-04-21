<?php
/**
 * Created by PhpStorm.
 * User: nofuture17
 * Date: 21.04.17
 * Time: 8:15
 */

namespace kupi_othodov_ru\module_catalog\models;

require_once __DIR__ . '/../migrations/m170421_044647_gallery_images.php';

/**
 * @property integer $id
 * @property integer $id_item
 * @property integer $active
 * @property string $name
 * @property string $alt
 * @property string $content
 * @property string $text
 * @property integer $priority
 */
class CatalogImage extends \amd_php_dev\yii2_components\models\gallery\ImageGalleryItem
{
    const IMAGES_URL_ALIAS = '@web/data/images/catalog/gallery/images/';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return \m170421_044647_gallery_images::$tableName;
    }

    /**
     * @inheritdoc
     * @return CatalogImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CatalogImageQuery(get_called_class());
    }
}