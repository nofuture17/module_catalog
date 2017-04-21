<?php

use amd_php_dev\yii2_components\migrations\Migration;
use amd_php_dev\yii2_components\migrations\generators\GalleryItem;

class m170421_044647_gallery_images extends Migration
{
    public static $tableName = '{{%catalog_gallery_image}}';

    public function safeUp()
    {
        $generator = new GalleryItem($this, self::$tableName);
        $generator->create();
    }

    public function safeDown()
    {
        $this->dropTable(self::$tableName);
    }
}
