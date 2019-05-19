<?php

namespace WebBundle\Controller;

use CoreBundle\Controller\Controller;
use WebBundle\Model\Transaction;

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
     * TransactionController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->transactionModel = new Transaction();
    }

    public function index()
    {
        return $this->transactionModel->getAll();
    }
}