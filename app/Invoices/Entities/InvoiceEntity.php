<?php

namespace App\Invoices\Entities;

use Core\Entities\BaseEntity;

/**
 * Class InvoiceEntity
 *
 * @namespace App\Invoices\Entities
 */
class InvoiceEntity extends BaseEntity
{
    const ENTITY = 'InvoiceEntity';
    /**
     * @var  $id
     */
    protected $id;
    /**
     * @var  $client
     */
    protected $client;
    /**
     * @var  $invoiceAmount
     */
    protected $invoiceAmount;
    /**
     * @var  $invoiceAmountPlusVat
     */
    protected $invoiceAmountPlusVat;
    /**
     * @var  $vatRate
     */
    protected $vatRate;
    /**
     * @var  $invoiceStatus
     */
    protected $invoiceStatus;
    /**
     * @var  $invoiceDate
     */
    protected $invoiceDate;
    /**
     * @var  $createdAt
     */
    protected $createdAt;

    /**
     * InvoiceEntity constructor.
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
     * getId
     *
     * @return mixed $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * setId
     *
     * @param mixed $id
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * getClient
     *
     * @return mixed $client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * setClient
     *
     * @param mixed $client
     *
     * @return void
     */
    public function setClient($client)
    {
        $this->client = $client;
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

    /**
     * getInvoiceAmountPlusVat
     *
     * @return mixed $invoiceAmountPlusVat
     */
    public function getInvoiceAmountPlusVat()
    {
        return $this->invoiceAmountPlusVat;
    }

    /**
     * setInvoiceAmountPlusVat
     *
     * @param mixed $invoiceAmountPlusVat
     *
     * @return void
     */
    public function setInvoiceAmountPlusVat($invoiceAmountPlusVat)
    {
        $this->invoiceAmountPlusVat = $invoiceAmountPlusVat;
    }

    /**
     * getVatRate
     *
     * @return mixed $vatRate
     */
    public function getVatRate()
    {
        return $this->vatRate;
    }

    /**
     * setVatRate
     *
     * @param mixed $vatRate
     *
     * @return void
     */
    public function setVatRate($vatRate)
    {
        $this->vatRate = $vatRate;
    }

    /**
     * getInvoiceStatus
     *
     * @return mixed $invoiceStatus
     */
    public function getInvoiceStatus()
    {
        return $this->invoiceStatus;
    }

    /**
     * setInvoiceStatus
     *
     * @param mixed $invoiceStatus
     *
     * @return void
     */
    public function setInvoiceStatus($invoiceStatus)
    {
        $this->invoiceStatus = $invoiceStatus;
    }

    /**
     * getInvoiceDate
     *
     * @return mixed $invoiceDate
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * setInvoiceDate
     *
     * @param mixed $invoiceDate
     *
     * @return void
     */
    public function setInvoiceDate($invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;
    }

    /**
     * getCreatedAt
     *
     * @return mixed $createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * setCreatedAt
     *
     * @param mixed $createdAt
     *
     * @return void
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
