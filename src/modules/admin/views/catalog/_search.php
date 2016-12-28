<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model kupi_othodov_ru\module_catalog\models\CatalogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_parent') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'active') ?>

    <?php echo $form->field($model, 'priority') ?>

    <?php echo $form->field($model, 'created_at') ?>

    <?php echo $form->field($model, 'updated_at') ?>

    <?php echo $form->field($model, 'author') ?>

    <?php echo $form->field($model, 'name') ?>

    <?php echo $form->field($model, 'name_small') ?>

    <?php echo $form->field($model, 'url') ?>

    <?php echo $form->field($model, 'meta_title') ?>

    <?php echo $form->field($model, 'meta_keywords') ?>

    <?php echo $form->field($model, 'meta_description') ?>

    <?php echo $form->field($model, 'text_small') ?>

    <?php echo $form->field($model, 'text_full') ?>

    <?php echo $form->field($model, 'links') ?>

    <?php echo $form->field($model, 'snipets') ?>

    <?php echo $form->field($model, 'image_small') ?>

    <?php echo $form->field($model, 'image_full') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
