<?php

namespace WebBundle\Controller;

use CoreBundle\Controller\Controller;

/**
 * Class AppController
 *
 * @package WebBundle\Controller
 */
class AppController extends Controller
{
    /**
     * Default Action
     */
    public function index(): void
    {
        $this->view->create('Index.php');
    }
}