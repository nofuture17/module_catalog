<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\catalog\models\CatalogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="catalog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Список',
                'content' => $this->render('_items', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]),
                'active' => true
            ],
            [
                'label' => 'Расширенный поиск',
                'content' => $this->render('_search', ['model' => $searchModel]),
            ],
        ],
    ]); ?>

</div>
