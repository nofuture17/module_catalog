<?php
/* @var $this yii\web\View */
/* @var $model kupi_othodov_ru\module_catalog\models\Catalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="options-set" id="item-options">
    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
        'model'     => $model,
        'attribute' => \kupi_othodov_ru\module_catalog\models\Catalog::ATTR_OPTIONS,
        'label'     => true,
        'form'      => $form,
    ]); ?>
</div>
