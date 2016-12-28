<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model kupi_othodov_ru\module_catalog\models\Catalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data'],
        'id' => 'item-form',
    ]); ?>

    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Основное',
                'content' => $this->render('_item-fields', ['model' => $model, 'form' => $form]),
                'active' => true
            ],
            [
                'label' => 'Дополнительно',
                'content' => $model->isRoot() ? '' : $this->render('_item-options', ['model' => $model, 'form' => $form]),
            ],
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
