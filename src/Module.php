<?php

namespace app\modules\catalog;

/**
 * catalog module definition class
 */
class Module extends \amd_php_dev\yii2_components\modules\Module
{
    //public $layout      = '@app/views/layouts/default';

    use \amd_php_dev\yii2_components\modules\ComposerModuleTrait;

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\catalog\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->modules = [
            'admin' => [
                'class' => '\app\modules\catalog\modules\admin\Module',
            ],
        ];

        // custom initialization code goes here
    }

    public function getUrlRules()
    {
        return array_merge(
            parent::getUrlRules(),
            [
                [
                    'rules' => [new \app\modules\catalog\urlRules\Rules()],
                    'append' => true,
                ],
            ]
        );
    }

    //public static function getMenuItems() {
    //    return [
    //        'section' => 'catalog',
    //        'items' => [
    //            [
    //                'label' => 'catalog',
    //                'items' => [
    //                    ['label' => 'label', 'url' => ['']],
    //                ]
    //            ]
    //        ],
    //    ];
    //}
}
