<?php

namespace CoreBundle\Controller;

/**
 * Class Controller
 *
 * @package CoreBundle\Controller
 */
abstract class Controller
{
    /**
     * @var
     */
    public $model;

    /**
     * @var View
     */
    public $view;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->view = new View();
    }

    abstract public function index();
}
