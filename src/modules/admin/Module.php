<?php

namespace app\modules\catalog\modules\admin;

/**
 * catalog module definition class
 */
class Module extends \amd_php_dev\yii2_components\modules\Admin
{
    //public $layout      = '@app/views/layouts/default';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\catalog\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        //$this->modules = [
        //
        //];

        // custom initialization code goes here
    }

    public static function getMenuItems() {
        return [
            'section' => 'admin',
            'items' => [
                [
                    'label' => 'Каталог',
                    'items' => [
                        ['label' => 'Каталог', 'url' => ['/catalog/admin/catalog/index']],
                        ['label' => 'Храктеристики', 'url' => ['/catalog/admin/catalog-option/index']],
                        ['label' => 'Группы характеристик', 'url' => ['/catalog/admin/catalog-option-group/index']],
                        ['label' => 'Комментарии', 'url' => ['/catalog/admin/comment/index']],
                        ['label' => 'Производство', 'url' => ['/catalog/admin/manufacture/index']],
                    ]
                ]
            ],
        ];
    }
}
