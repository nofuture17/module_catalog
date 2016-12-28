<?php
/* @var $this yii\web\View */
/* @var $model kupi_othodov_ru\module_catalog\models\Catalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-6">
        <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'active',
            'label'     => true,
            'form'      => $form,
        ]); ?>
    </div>
    <div class="col-md-6">
        <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'priority',
            'label'     => true,
            'form'      => $form,
        ]); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'name',
            'label'     => true,
            'form'      => $form,
        ]); ?>
    </div>
    <div class="col-md-6">
        <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'name_small',
            'label'     => true,
            'form'      => $form,
        ]); ?>
    </div>
</div>

<?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
    'model'     => $model,
    'attribute' => 'id_parent',
    'label'     => true,
    'form'      => $form,
]); ?>

<div class="row">
    <div class="col-md-6">
        <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'url',
            'label'     => true,
            'form'      => $form,
        ]); ?>
    </div>
    <div class="col-md-6">
        <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'meta_title',
            'label'     => true,
            'form'      => $form,
        ]); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'meta_description',
            'label'     => true,
            'form'      => $form,
        ]); ?>
    </div>
    <div class="col-md-6">
        <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'text_small',
            'label'     => true,
            'form'      => $form,
        ]); ?>
    </div>
</div>

<div class="row">
    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
        'model'     => $model,
        'attribute' => 'image_full',
        'label'     => true,
        'form'      => $form,
    ]); ?>
</div>

<?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
    'model'     => $model,
    'attribute' => 'text_full',
    'label'     => true,
    'form'      => $form,
]); ?>

<?php
    if ($model->isNewRecord || !$model->isRoot()) {
        echo
        \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => \kupi_othodov_ru\module_catalog\models\Catalog::ATTR_MANUFACTURES,
            'label'     => true,
            'form'      => $form,
        ]);
    }
?>
