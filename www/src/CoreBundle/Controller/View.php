<?php

namespace CoreBundle\Controller;

/**
 * Class View
 *
 * @package CoreBundle\Controller
 */
class View
{
    /**
     * @param      $content
     * @param null $data
     */
    public function create($content, $data = null): void
    {
        include_once '../src/WebBundle/View/'.$content;
        include_once '../src/WebBundle/View/Layout.php';
    }
}
