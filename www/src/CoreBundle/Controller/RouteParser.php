<?php

use CoreBundle\Controller\Config;
use CoreBundle\Controller\ControllerFactory;
use CoreBundle\Controller\Controller;
use CoreBundle\Dictionary\Settings;

/**
 * Class RouteParser
 */
class RouteParser
{
    /**
     * @throws Exception
     */
    public static function up(): void
    {
        $controllerName = Config::get(Settings::DEFAULT_CONTROLLER);
        $actionName = Config::get(Settings::DEFAULT_ACTION);
        $routes = explode ('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])){
            $controllerName = $routes[1];
        }

        $controllerName = self::getSanitizedName($controllerName);
        $actionName = self::getSanitizedName($actionName, true);
        $controllerFile = self::getFile($controllerName);
        $controller = ControllerFactory::create($controllerName);

        if ($controller instanceof Controller && method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            $control= explode('.',$controllerFile);
            throw new \Exception(sprintf('Controller does not exist %s',$control) );
        }
    }

    /**
     * @param $name
     *
     * @return string
     */
    private static function getFile($name): string
    {
        $fileName = mb_convert_case($name,2,'UTF-8');

        return sprintf('%sController.php', $fileName);
    }

    /**
     * @param      $name
     * @param bool $isModel
     *
     * @return string
     */
    private static function getSanitizedName($name, $isModel = false) : string
    {
        if ($isModel) {
            return strtolower(trim($name));
        }

        return ucfirst(strtolower(trim($name)));
    }
}
