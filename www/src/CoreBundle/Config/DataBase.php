<?php

namespace CoreBundle\Config;

use MysqliDb;
use CoreBundle\Controller\Config;
use CoreBundle\Dictionary\Settings;

/**
 * Class DataBase
 *
 * @package CoreBundle\Config
 */
class DataBase
{
    /**
     * @var MysqliDb
     */
    protected $db;

    /**
     * DataBase constructor.
     */
    public function __construct()
    {
        $this->db = new MysqliDb (
            Config::get(Settings::DB_HOST),
            Config::get(Settings::DB_USER),
            Config::get(Settings::DB_PASSWORD),
            Config::get(Settings::DB_NAME)
        );
    }

    /**
     * @param $name
     *
     * @return array
     */
    public function getAll($name): array
    {
        return $this->db->get($name);
    }

    /**
     * @param $table
     * @param $column
     * @param $value
     *
     * @return array
     */
    public function getBy($table, $column, $value): array
    {
        $this->db->where($column, $value);

        return $this->db->getOne($table);
    }

    /**
     * @param string $table
     * @param array  $data
     *
     * @return bool
     */
    public function add(string $table, array $data): bool
    {
        return $this->db->insert($table, $data);
    }
}
