<?php

namespace App\Invoices\Repositories;

use App\Invoices\Entities\InvoiceEntity;
use Core\Entities\BaseEntity;
use Core\Repositories\BasePdoRepository;
use PDO;

/**
 * Class PdoInvoiceRepository
 *
 * @namespace App\Invoices\Repositories
 */
class PdoInvoiceRepository extends BasePdoRepository implements InvoiceRepository
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
        $query = "SELECT * FROM `invoices`";

        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $entities = [];

        foreach ($result as $key => $value) {
            $entities[] = new InvoiceEntity($value);
        }

        return $entities;
    }

    /**
     * fetchById
     *
     * @param int $id
     *
     * @return InvoiceEntity|mixed
     *
     * @throws \Exception
     */
    public function fetchById(int $id)
    {
        $query = "SELECT * FROM `invoices` WHERE `id` = :id LIMIT 1";

        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return new InvoiceEntity($result);
    }

    /**
     * store
     *
     * @param BaseEntity $entity
     *
     * @return bool
     */
    public function store(BaseEntity $entity)
    {
        $query = [];
        $query[] = "client = '".$entity->getClient()."'";
        $query[] = "invoice_amount = '".$entity->getInvoiceAmount()."'";
        $query[] = "invoice_amount_plus_vat = '".$entity->getInvoiceAmountPlusVat()."'";
        $query[] = "vat_rate = '".$entity->getVatRate()."'";
        $query[] = "invoice_status = '".$entity->getInvoiceStatus()."'";
        $query[] = "invoice_date = '".$entity->getInvoiceDate()."'";
        $query[] = "created_at = '".$entity->getCreatedAt()."'";

        $query = "UPDATE `invoices` SET ".implode(', ', $query)." WHERE id = :id";

        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $entity->getId());

        return $statement->execute();
    }
}
