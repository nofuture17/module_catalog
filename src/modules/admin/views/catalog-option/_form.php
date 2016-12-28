<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model kupi_othodov_ru\module_catalog\models\CatalogOption */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-option-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

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
                    'attribute' => 'in_filter',
                    'label'     => true,
                    'form'      => $form,
                ]); ?>
        </div>

        <div class="col-md-6">
            <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
                    'model'     => $model,
                    'attribute' => 'required',
                    'label'     => true,
                    'form'      => $form,
                ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
                    'model'     => $model,
                    'attribute' => 'code',
                    'label'     => true,
                    'form'      => $form,
                ]); ?>
        </div>

        <div class="col-md-6">
            <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
                    'model'     => $model,
                    'attribute' => 'image',
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
                    'attribute' => 'type',
                    'label'     => true,
                    'form'      => $form,
                ]); ?>
        </div>
    </div>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'id_group',
            'label'     => true,
            'form'      => $form,
        ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'variants',
            'label'     => true,
            'form'      => $form,
        ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'default',
            'label'     => true,
            'form'      => $form,
        ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'description',
            'label'     => true,
            'form'      => $form,
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
