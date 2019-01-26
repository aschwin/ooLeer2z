<?php

namespace App\Transactions\Entities;

use Core\Entities\BaseEntity;

/**
 * Class TransactionEntity
 *
 * @namespace App\Transactions\Entities
 */
class TransactionEntity extends BaseEntity
{
    const ENTITY = 'TransactionEntity';

    /**
     * @var  $invoiceId
     */
    protected $invoiceId;
    /**
     * @var  $companyName
     */
    protected $companyName;
    /**
     * @var  $invoiceAmount
     */
    protected $invoiceAmount;

    /**
     * TransactionEntity constructor.
     *
     * @param array|null $attributes
     *
     * @throws \Exception
     */
    public function __construct(array $attributes = null)
    {
        if ($attributes) {
            $this->setAttributes($attributes);
        }
    }

    /**
     * getInvoiceId
     *
     * @return mixed
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * setInvoiceId
     *
     * @param $invoiceId
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;
    }

    /**
     * getCompanyName
     *
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * setCompanyName
     *
     * @param $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    /**
     * getInvoiceAmount
     *
     * @return mixed $invoiceAmount
     */
    public function getInvoiceAmount()
    {
        return $this->invoiceAmount;
    }

    /**
     * setInvoiceAmount
     *
     * @param mixed $invoiceAmount
     *
     * @return void
     */
    public function setInvoiceAmount($invoiceAmount)
    {
        $this->invoiceAmount = $invoiceAmount;
    }
}
