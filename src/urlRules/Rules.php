<?php
/**
 * Created by PhpStorm.
 * User: nofuture17
 * Date: 05.11.2016
 * Time: 21:06
 */

namespace kupi_othodov_ru\module_catalog\urlRules;

use yii\web\UrlRuleInterface;
use yii\base\Object;

class Rules extends Object implements UrlRuleInterface
{

    public function createUrl($manager, $route, $params)
    {
        $result = false;

        if ($route == 'catalog/default/index') {
            $url = 'catalog';

            if (!empty($params['parent'])) {
                $url .= '/' . $params['parent'];
            }

            if (!empty($params['item'])) {
                $url .= '/' . $params['item'];
            }

            $result = $url;
        }

        if ($route == 'catalog/default/online') {
            $url = 'online';

            $result = $url;
        }

        return $result;
    }

    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();

        if ($request->hostName != \yii::$app->params['HOST']) {
            return false;
        }

        if (preg_match("/^catalog(:?\/([^\s\/]+))?(:?\/([^\s\/]+))?$/", $pathInfo, $matches)) {
            if (!empty($matches[4])) {
                $parent = !empty($matches[2]) ? $matches[2] : null;
                $item = !empty($matches[4]) ? $matches[4] : null;
            } else {
                $item = !empty($matches[2]) ? $matches[2] : null;
                $parent = null;
            }

            return ['catalog/default/index', ['item' => $item, 'parent' => $parent]];
        }

        if ($pathInfo == 'online') {
            return ['catalog/default/online', []];
        }
        
        return false;
    }
}