<?php

namespace WebBundle\Model;

use CoreBundle\Model\Model;
use WebBundle\Dictionary\Transactions;
use WebBundle\Dictionary\Statuses;
use WebBundle\Dictionary\Users;

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

    /**
     * @param int $userId
     * @param int $amount
     *
     * @return array
     *
     * @throws \Exception
     */
    public function addTransaction(int $userId, int $amount): array
    {
        $status = $this->getStatus();

        $data = [
            Transactions::USER_ID => $userId,
            Transactions::AMOUNT => $amount,
            Transactions::STATUS => $status
        ];

        $this->db->add(self::TABLE_NAME, $data);

       if (Statuses::REJECTED){
           return [
               'message' => 'Transaction has been rejected'
           ];
       }

       return [
           Users::ID => $this->getId(),
           Transactions::STATUS => $status
       ];
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    private function getStatus(): string
    {
        $value = random_int(0,1);

        if ($value === 1) {
            return Statuses::APPROVED;
        }

        return Statuses::REJECTED;
    }

    /**
     * @return int
     *
     * @throws \Exception
     */
    private function getId(): int
    {
        return random_int(0,1000);
    }
}
