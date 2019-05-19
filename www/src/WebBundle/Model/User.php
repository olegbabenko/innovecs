<?php

namespace WebBundle\Model;

use CoreBundle\Model\Model;
use WebBundle\Dictionary\Users;

/**
 * Class User
 *
 * @package WebBundle\Model
 */
class User extends Model
{
    /**
     * @const string
     */
    private const TABLE = 'users';

    /**
     * @param $email
     *
     * @return int|null
     */
    public function getUserId($email): ?int
    {
        $result =  $this->db->getBy(self::TABLE, Users::EMAIL, $email);

        if ($result && array_key_exists(Users::ID, $result)){
            return $result[Users::ID];
        }

        return null;
    }
}
