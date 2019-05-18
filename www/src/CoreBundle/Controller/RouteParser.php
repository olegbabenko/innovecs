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

        if (!empty($routes[2])){
            $actionName = $routes[2];
        }

        $controllerFile = self::getFile($controllerName);
        $controllerPath = self::getPath($controllerFile);
        self::checkFile($controllerFile, $controllerPath);

        $modelFile = self::getFile($controllerName, true);
        $modelPath = self::getPath($modelFile, true);
        self::checkFile($modelFile, $modelPath);

        $controller = ControllerFactory::create($controllerName);

        if ($controller instanceof Controller && method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            $control= explode('.',$controllerFile);
            throw new \Exception(sprintf('Controller does not exist %s',$control) );
        }
    }

    /**
     * @param      $name
     * @param bool $isModel
     *
     * @return string
     */
    private static function getFile($name, $isModel = false): string
    {
        $fileName = mb_convert_case($name,2,'UTF-8');

        if ($isModel){
            return sprintf('%s.php', $fileName);
        }

        return sprintf('%sController.php', $fileName);
    }

    /**
     * @param      $fileName
     * @param bool $isModel
     *
     * @return string
     */
    private static function getPath($fileName, $isModel = false): string
    {
        $webBundlePath = '../src/WebBundle';

        if ($isModel) {
            return sprintf('%s/Model/%s',$webBundlePath, $fileName);
        }

        return sprintf('%s/Controller/%s',$webBundlePath, $fileName);
    }

    /**
     * @param $file
     * @param $path
     *
     * @throws Exception
     */
    private static function checkFile($file, $path): void
    {
        if (file_exists($path)){
            require_once $path;
        } else {
            throw new \Exception(sprintf('Failed to included %s', $file));
        }
    }
}
