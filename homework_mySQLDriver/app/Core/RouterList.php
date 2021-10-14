<?php

namespace App\Core;

class RouterList {
    protected static $routerRules = [];

    public static function addRouter($routerRule) {
        self::$routerRules[] = $routerRule;
    }

    public static function init() {
        foreach (self::$routerRules as $routerRule) {
            if($routerRule['url_path'] == $_SERVER['REQUEST_URI'] && $routerRule['method'] == $_SERVER['REQUEST_METHOD']) {
                $controllerWithMethod = $routerRule['handler'];
                $controllerName = explode('@', $controllerWithMethod)[0];
                $methodName = explode('@', $controllerWithMethod)[1];
                $t = 'App\\Controllers\\' . $controllerName;
                $controller = new $t;
                $controller->{$methodName}();
                return;
            }
        }

        renderView('404');
    }
}