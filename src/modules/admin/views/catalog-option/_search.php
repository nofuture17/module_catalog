<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\catalog\models\CatalogOptionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-option-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'active') ?>

    <?= $form->field($model, 'priority') ?>

    <?= $form->field($model, 'in_filter') ?>

    <?= $form->field($model, 'required') ?>

    <?php // echo $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'variants') ?>

    <?php // echo $form->field($model, 'default') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
