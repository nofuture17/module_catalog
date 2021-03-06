<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel kupi_othodov_ru\module_catalog\models\CatalogSearch */
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
            [
                'class' => '\amd_php_dev\yii2_components\widgets\grid\SetColumn',
                'attribute' => 'url',
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
                        // 'priority',
            // 'created_at',
            // 'updated_at',
            // 'author',
            // 'name',
            // 'name_small',
            // 'url:url',
            // 'meta_title',
            // 'meta_keywords',
            // 'meta_description',
            // 'text_small:ntext',
            // 'text_full:ntext',
            // 'links:ntext',
            // 'snipets:ntext',
            // 'image_small',
            // 'image_full',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]); ?>
    