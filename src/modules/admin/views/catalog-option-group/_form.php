<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\catalog\models\CatalogOptionGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-option-group-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'active',
            'label'     => true,
            'form'      => $form,
        ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'priority',
            'label'     => true,
            'form'      => $form,
        ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
        'model'     => $model,
        'attribute' => 'name',
        'label'     => true,
        'form'      => $form,
    ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'id_parent',
            'label'     => true,
            'form'      => $form,
        ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'code',
            'label'     => true,
            'form'      => $form,
        ]); ?>

    <?= \amd_php_dev\yii2_components\widgets\form\SmartInput::widget([
            'model'     => $model,
            'attribute' => 'image',
            'label'     => true,
            'form'      => $form,
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
