<?php

namespace WebBundle\Model;

use CoreBundle\Model\Model;

/**
 * Class Transaction
 *
 * @package WebBundle\Model
 */
class Transaction extends Model
{
    private const TABLE_NAME = 'transactions';

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->db->getAll(self::TABLE_NAME);
    }
}
