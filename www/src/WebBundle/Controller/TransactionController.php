<?php

namespace WebBundle\Controller;

use CoreBundle\Controller\Controller;
use WebBundle\Model\Transaction;
use WebBundle\Model\User;
use WebBundle\Dictionary\Users;

/**
 * Class TransactionController
 *
 * @package WebBundle\Controller
 */
class TransactionController extends Controller
{
    /**
     * @var Transaction
     */
    private  $transactionModel;

    /**
     * @var
     */
    private $userModel;

    /**
     * TransactionController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->transactionModel = new Transaction();
        $this->userModel = new User();
    }


    /**
     * @return array|null
     *
     * @throws \Exception
     */
    public function index(): ?array
    {
        $result = null;
        $userId = null;

        if ($_REQUEST && array_key_exists(Users::EMAIL, $_REQUEST)){
            $userId = $this->userModel->getUserId($_REQUEST[Users::EMAIL]);
        } else {
            throw new \Exception(sprintf('Parameter %s does not exist', Users::EMAIL));
        }

        if ($userId && array_key_exists(Users::AMOUNT, $_REQUEST)){
            $result = $this->transactionModel->addTransaction($userId, $_REQUEST[Users::AMOUNT]);
        } else {
            throw new \Exception(sprintf('Parameter %s does not exist', Users::AMOUNT));
        }

        return $result;
    }
}
