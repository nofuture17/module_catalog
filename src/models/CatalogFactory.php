<?php
/**
 * Created by PhpStorm.
 * User: nofuture17
 * Date: 03.04.17
 * Time: 15:34
 */

namespace kupi_othodov_ru\module_catalog\models;


class CatalogFactory
{
    public static $modelClass = '\kupi_othodov_ru\module_catalog\models\Catalog';

    protected static $query;

    /**
     * @param $url
     * @return \kupi_othodov_ru\module_catalog\models\Catalog|null
     */
    public static function getItemByUrl($url)
    {
        $query = self::getQuery();
        return $query->with('manufacturesRelation')
            ->defaultScope()
            ->andWhere('url = :url', ['url' => $url])
            ->one();
    }

    /**
     * @param $item \kupi_othodov_ru\module_catalog\models\Catalog
     * @return \kupi_othodov_ru\module_catalog\models\Catalog|null
     */
    public static function getFirstParent($item)
    {
        return $item->getFirstParent();
    }

    /**
     * @param $item \kupi_othodov_ru\module_catalog\models\Catalog
     * @param $depth int
     * @return \kupi_othodov_ru\module_catalog\models\Catalog|null
     */
    public static function getParent($item, $depth)
    {
        return $item->parents($depth)->one();
    }

    /**
     * @return \kupi_othodov_ru\module_catalog\models\Catalog|null
     */
    public static function getCatalogRoot()
    {
        return Catalog::find()->roots()->one();
    }

    /**
     * @param $item \kupi_othodov_ru\module_catalog\models\Catalog
     * @param $depth int
     * @return \kupi_othodov_ru\module_catalog\models\Catalog[]|null
     */
    public static function getChildren($item, $depth)
    {
        return $item->children($depth)->defaultScope()->defaultSort()->all();
    }

    /**
     * @param $parent \kupi_othodov_ru\module_catalog\models\Catalog
     * @param $itemId int
     * @return mixed \kupi_othodov_ru\module_catalog\models\Catalog[]|null
     */
    public static function getSimilarItemsFromParent($parent, $itemId)
    {
        return $parent->children(1)
            ->defaultScope()
            ->defaultSort()
            ->andWhere('`id` != ' . (int) $itemId)
            ->all();
    }

    public static function getQuery()
    {
        if (self::$query === null) {
            self::$query = call_user_func_array([self::$modelClass, 'find'], []);
        }

        return self::$query;
    }
}