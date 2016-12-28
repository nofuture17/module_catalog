<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\catalog\models\Manufacture */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manufacture-form">

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

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
        'model'     => $model,
        'attribute' => \app\modules\catalog\models\Manufacture::ATTR_CATALOGS,
        'label'     => true,
        'form'      => $form,
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
