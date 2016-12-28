<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\catalog\models\CatalogOptionGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'id',
                'setFilter' => true,
                'formAction' => [
                    'route' => 'update',
                    'params' => ['id' => ':id']
                ],
            ],
                        [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'active',
                'setFilter' => true,
                'formAction' => [
                    'route' => 'update',
                    'params' => ['id' => ':id']
                ],
            ],
            [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'priority',
                'setFilter' => true,
                'formAction' => [
                    'route' => 'update',
                    'params' => ['id' => ':id']
                ],
            ],
            [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'name',
                'setFilter' => true,
                'formAction' => [
                    'route' => 'update',
                    'params' => ['id' => ':id']
                ],
            ],
                        // 'image',
            // 'name',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]); ?>
    