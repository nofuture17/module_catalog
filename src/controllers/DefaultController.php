<?php

namespace kupi_othodov_ru\module_catalog\controllers;

use amd_php_dev\yii2_components\controllers\PublicController;
use kupi_othodov_ru\module_catalog\models\Catalog;

/**
 * Default controller for the `catalog` module
 */
class DefaultController extends PublicController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($item = null, $parent = null)
    {
        $pageData = null;
        $items = null;

        extract($this->getCatalogData($item, $parent));

        // Задаём мета теги
        $this->setMetaData($pageData);

        $view = !empty($item) ? 'item' : 'index';

        // вывод
        return $this->render(
            $view,
            [
                'pageData' => $pageData,
                'items' => $items,
            ]
        );
    }

    public function actionOnline()
    {
        $pageData = Catalog::find()->where('url = :url', ['url' => 'online'])->one();

        // Задаём мета теги
        $this->setMetaData($pageData);

        $items = $pageData->getChildren();

        // вывод
        return $this->render(
            'online',
            [
                'pageData' => $pageData,
                'items' => $items,
            ]
        );
    }

    /**
     * Вернёт массив с pageData и items, если не правильный запрос - сделает редирект
     * @param $item
     * @param $parent
     * @return array
     */
    protected function getCatalogData($item, $parent)
    {
        $items = [];

        // Получить pageData из item или корневого каталога
        if (!empty($item)) {
            $pageData = Catalog::find()
                ->with('manufacturesRelation')
                ->defaultScope()
                ->andWhere('url = :url', ['url' => $item])
                ->one();

            if (empty($pageData)) {
                $url = \yii::$app->urlManager->createUrl([
                    'catalog/default/index',
                ]);
                \yii::$app->response->redirect($url, 301);
                \yii::$app->end();
            }

            if (!empty($parent) || $pageData->depth > 1) {
                $parentItem = $pageData->getFirstParent();

                if (empty($parentItem) || $parentItem->isRoot()) {
                    $url = \yii::$app->urlManager->createUrl([
                        'catalog/default/index',
                        'item' => $item,
                    ]);
                    \yii::$app->response->redirect($url, 301);
                    \yii::$app->end();
                } else if ($parentItem->url == 'online') {
                    $url = \yii::$app->urlManager->createUrl([
                        'catalog/default/online',
                    ]);
                    \yii::$app->response->redirect($url, 301);
                    \yii::$app->end();
                } elseif ($parentItem->url != $parent) {
                    $url = \yii::$app->urlManager->createUrl([
                        'catalog/default/index',
                        'item' => $item,
                        'parent' => $parentItem->url
                    ]);
                    \yii::$app->response->redirect($url, 301);
                    \yii::$app->end();
                }

                $parentItem = $pageData->parents(1)->one();
            }
        } else {
            $pageData = Catalog::find()->roots()->one();
        }

        $items = $pageData->children(1)->defaultScope()->defaultSort()->all();

        if (!empty($parentItem)) {
            array_unshift($items, $parentItem);
        }

        return ['pageData' => $pageData, 'items' => $items];
    }
}
