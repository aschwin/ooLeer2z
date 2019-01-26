<?php

namespace App\Transactions\Repositories;

use App\Transactions\Entities\TransactionEntity;
use Core\Repositories\BasePdoRepository;
use PDO;

/**
 * Class PdoTransactionRepository
 *
 * @namespace App\Transactions\Repositories
 */
class PdoTransactionRepository extends BasePdoRepository implements TransactionRepository
{
    /**
     * fetchAll
     *
     * @return array|mixed
     *
     * @throws \Exception
     */
    public function fetchAll()
    {
        $statement = $this->pdo->prepare("SELECT `id` AS invoice_id, `client` AS company_name, `invoice_amount` FROM `invoices`");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $entities = [];

        foreach ($result as $key => $value) {
            $entities[] = new TransactionEntity($value);
        }

        return $entities;
    }
}
