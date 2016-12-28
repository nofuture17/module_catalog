<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel kupi_othodov_ru\module_catalog\models\CatalogOptionGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="catalog-option-group-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php echo $this->render('_items', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]); ?>
</div>
