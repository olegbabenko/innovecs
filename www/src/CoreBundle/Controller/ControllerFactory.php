<?php

namespace CoreBundle\Controller;

use WebBundle\Controller\AppController;
use CoreBundle\Dictionary\Controllers;

/**
 * Class ControllerFactory
 *
 * @package CoreBundle\Controller
 */
class ControllerFactory
{
    /**
     * @param $name
     *
     * @return AppController
     */
    public static function create($name): ?AppController
    {
        if ($name === Controllers::APP) {
            return new AppController();
        }

        return null;
    }
}