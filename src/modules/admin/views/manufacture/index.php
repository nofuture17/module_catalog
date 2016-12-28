<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\catalog\models\ManufactureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="manufacture-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php echo $this->render('_items', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]); ?>
</div>
