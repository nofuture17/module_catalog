<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kupi_othodov_ru\module_catalog\models\Catalog */

?>
<div class="catalog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
