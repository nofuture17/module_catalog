<?php

use amd_php_dev\yii2_components\migrations\Migration;
use amd_php_dev\yii2_components\migrations\generators\Page;
use amd_php_dev\yii2_components\migrations\generators\Option;
use amd_php_dev\yii2_components\migrations\generators\OptionValue;
use amd_php_dev\yii2_components\migrations\generators\OptionGroup;
use amd_php_dev\yii2_components\migrations\generators\Generator;

class m161212_065351_instal_main_catalog_data extends Migration
{
    /**
     * @var string
     * page, nestedSets, (sting) $price
     */
    public static $catalogTableName                 = '{{%catalog_catalog}}';
    public static $catalogOptionTableName           = '{{%catalog_catalog_option}}';
    public static $catalogOptionValueTableName      = '{{%catalog_catalog_option_value}}';
    public static $catalogOptionGroupTableName      = '{{%catalog_catalog_option_group}}';

    public static $manufactureTableName             = '{{%catalog_manufacture}}';
    public static $manufactureToCatalogTableName    = '{{%catalog_manufacture_to_catalog}}';


    public static $commentTableName                 = '{{%catalog_comment}}';
    public static $commentOwnerTableName            = '{{%catalog_comment_owner}}';
    public static $commentLikeTableName             = '{{%catalog_comment_like}}';

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        // Миграция каталога
        $generator = new Page($this, self::$catalogTableName);
        $generator->additionalColumns['id_parent']      = $this->integer();
        $generator->additionalColumns['lft']      = $this->integer();
        $generator->additionalColumns['rgt']      = $this->integer();
        $generator->additionalColumns['depth']    = $this->integer();
        $generator->addIndex('id_parent');
        $generator->addIndex('lft');
        $generator->addIndex('rgt');
        $generator->addIndex('depth');
        $generator->create();

        $generator = new Option($this, self::$catalogOptionTableName);
        $generator->additionalColumns['id_group']    = $this->integer();
        $generator->addIndex('id_group');
        $generator->create();

        $generator = new OptionValue($this, self::$catalogOptionValueTableName);
        $generator->create();

        $generator = new OptionGroup($this, self::$catalogOptionGroupTableName);
        $generator->create();

        $generator = new Page($this, self::$manufactureTableName);
        $generator->create();
        $this->createTable(self::$manufactureToCatalogTableName, [
            'id_item' => \yii\db\Schema::TYPE_INTEGER . ' NOT NULL',
            'id_related' => \yii\db\Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        $this->addPrimaryKey('', self::$manufactureToCatalogTableName, ['id_item', 'id_related']);


        $generator = new Generator($this, self::$commentTableName);
        $generator->additionalColumns['text'] = $this->text();
        $generator->additionalColumns['id_item'] = $this->integer();
        $generator->addIndex('id_item');
        $generator->additionalColumns['id_owner'] = $this->integer();
        $generator->addIndex('id_owner');
        $generator->additionalColumns['id_parent'] = $this->integer();
        $generator->addIndex('id_parent');
        $generator->additionalColumns['created_at'] = $this->integer();
        $generator->additionalColumns['updated_at'] = $this->integer();
        $generator->create();

        $generator = new Generator($this, self::$commentOwnerTableName);
        $generator->additionalColumns['name'] = $this->string(255);
        $generator->additionalColumns['image'] = $this->string(255);
        $generator->additionalColumns['ip'] = $this->string(255);
        $generator->addIndex('ip');
        $generator->additionalColumns['email'] = $this->string(255);
        $generator->addIndex('email');
        $generator->create();

        $generator = new Generator($this, self::$commentLikeTableName);
        $generator->additionalColumns['id_owner'] = $this->integer();
        $generator->addIndex('id_owner');
        $generator->additionalColumns['id_comment'] = $this->integer();
        $generator->addIndex('id_comment');
        $generator->create();
    }

    public function safeDown()
    {
        $this->dropTable(self::$catalogTableName);
        $this->dropTable(self::$catalogOptionTableName);
        $this->dropTable(self::$catalogOptionGroupTableName);
        $this->dropTable(self::$manufactureTableName);
        $this->dropTable(self::$commentTableName);
        $this->dropTable(self::$commentOwnerTableName);
        $this->dropTable(self::$commentLikeTableName);
    }
}
