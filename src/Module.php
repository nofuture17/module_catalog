<?php

namespace kupi_othodov_ru\module_catalog;

/**
 * catalog module definition class
 */
class Module extends \amd_php_dev\yii2_components\modules\Module
{
    //public $layout      = '@app/views/layouts/default';

    use \amd_php_dev\yii2_components\modules\ComposerModuleTrait;

    protected $_urlRules = [
        [
            'rules' => [
                ['class' => '\kupi_othodov_ru\module_catalog\urlRules\Rules']
            ],
            'append' => true,
        ],
    ];

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'kupi_othodov_ru\module_catalog\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->modules = [
            'admin' => [
                'class' => '\kupi_othodov_ru\module_catalog\modules\admin\Module',
            ],
        ];

        // custom initialization code goes here
    }
}
