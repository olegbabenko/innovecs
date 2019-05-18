<?php

namespace CoreBundle\Model;

use CoreBundle\Config\DataBase;

/**
 * Class Model
 *
 * @package CoreBundle\Model
 */
class Model
{
    /**
     * @var DataBase
     */
    protected $db;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = new DataBase();
    }
}
