<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel kupi_othodov_ru\module_catalog\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php echo $this->render('_items', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]); ?>
</div>
