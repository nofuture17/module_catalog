<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\catalog\models\CatalogOptionGroup */

?>
<div class="catalog-option-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
