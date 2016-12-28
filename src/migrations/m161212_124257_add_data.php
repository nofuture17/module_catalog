<?php

use yii\db\Migration;
use app\modules\catalog\models\Catalog;
use app\modules\catalog\models\CatalogOptionGroup;
use app\modules\catalog\models\CatalogOption;

class m161212_124257_add_data extends Migration
{
    public function up()
    {
        // Группа характеристик - MAIN
        if (!$main = CatalogOptionGroup::find()->where("code = 'MAIN'")->one()) {
            $main = new CatalogOptionGroup();
            $main->name = 'Общие характеристики';
            $main->code = 'MAIN';
            $main->active = CatalogOptionGroup::ACTIVE_ACTIVE;
            $main->save();
        }

        //Характеристика - UNIT
        if ($main && !$unit = CatalogOption::find()->where("code = 'UNIT'")->one()) {
            $unit = new CatalogOption();
            $unit->id_group = $main->id;
            $unit->active = CatalogOption::ACTIVE_ACTIVE;
            $unit->name = 'Единица измерения для цены';
            $unit->code = 'UNIT';
            $unit->type = CatalogOption::TYPE_VARIANT;
            $unit->variants = 'кг/руб|шт/руб';
            $unit->save();
        }

        //Характеристика - PRICE
        if ($main && !$price = CatalogOption::find()->where("code = 'PRICE'")->one()) {
            $price = new CatalogOption();
            $price->id_group = $main->id;
            $price->active = CatalogOption::ACTIVE_ACTIVE;
            $price->name = 'Цена';
            $price->code = 'PRICE';
            $price->type = CatalogOption::TYPE_NUMBER;
            $price->save();
        }

        //Характеристика - OPTIONS
        if ($main && !$price = CatalogOption::find()->where("code = 'OPTIONS'")->one()) {
            $price = new CatalogOption();
            $price->id_group = $main->id;
            $price->active = CatalogOption::ACTIVE_ACTIVE;
            $price->name = 'Характеристики';
            $price->code = 'OPTIONS';
            $price->type = CatalogOption::TYPE_REDACTOR;
            $price->save();
        }

        //Характеристика - MANUFACTURE
        if ($main && !$price = CatalogOption::find()->where("code = 'MANUFACTURE'")->one()) {
            $price = new CatalogOption();
            $price->id_group = $main->id;
            $price->active = CatalogOption::ACTIVE_ACTIVE;
            $price->name = 'Производство';
            $price->code = 'MANUFACTURE';
            $price->type = CatalogOption::TYPE_REDACTOR;
            $price->save();
        }

        //catalog
        if (!$catalog = Catalog::find()->where("url = 'catalog'")->one()) {
            $catalog = new Catalog();
            $catalog->id_parent = 0;
            $catalog->active = Catalog::ACTIVE_SKETCH;
            $catalog->name = 'Каталог';
            $catalog->meta_title = $catalog->name;
            $catalog->url = 'catalog';
            $catalog->save();
        }

        //online
        if (!$online = Catalog::find()->where("url = 'online'")->one()) {
            $online = new Catalog();
            $online->id_parent = $catalog->id;
            $online->active = Catalog::ACTIVE_SKETCH;
            $online->name = 'Поступления';
            $online->meta_title = $online->name;
            $online->url = 'online';
            $online->save();
        }
    }

    public function down()
    {
        echo "m161212_124257_add_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
