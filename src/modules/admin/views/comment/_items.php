<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel kupi_othodov_ru\module_catalog\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'text',
                'setFilter' => true,
                'formAction' => [
                    'route' => 'update',
                    'params' => ['id' => ':id']
                ],
            ],
                        [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'id_item',
                'setFilter' => true,
                'formAction' => [
                    'route' => 'update',
                    'params' => ['id' => ':id']
                ],
            ],
                        [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'id_owner',
                'setFilter' => true,
                'formAction' => [
                    'route' => 'update',
                    'params' => ['id' => ':id']
                ],
            ],
                        [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'id_parent',
                'setFilter' => true,
                'formAction' => [
                    'route' => 'update',
                    'params' => ['id' => ':id']
                ],
            ],
                        [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'created_at',
                'setFilter' => true,
                'formAction' => [
                    'route' => 'update',
                    'params' => ['id' => ':id']
                ],
            ],
                        // 'updated_at',
            // 'id',
            // 'active',
            // 'priority',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]); ?>
    