<?php

namespace CoreBundle\Controller;

/**
 * Class Controller
 *
 * @package CoreBundle\Controller
 */
class Controller
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
}
