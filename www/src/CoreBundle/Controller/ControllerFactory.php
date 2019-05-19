<?php

namespace CoreBundle\Controller;

use WebBundle\Controller\AppController;
use WebBundle\Controller\TransactionController;
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
     * @return AppController|TransactionController|null
     */
    public static function create($name)
    {
        if ($name === Controllers::APP) {
            return new AppController();
        }

        if ($name === Controllers::TRANSACTION) {
            return new TransactionController();
        }

        return null;
    }
}
