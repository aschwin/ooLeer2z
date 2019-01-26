<?php

namespace App\Invoices\Controllers;

use App\Invoices\Entities\InvoiceEntity;
use App\Invoices\Repositories\InvoiceRepository;
use App\Providers\PaginationProvider;
use Core\Repositories\DependencyRepository;

/**
 * Class InvoiceController
 *
 * @namespace App\Invoices\Controllers
 */
class InvoiceController
{
    const MODULE_NAME = 'Invoices';
    /**
     * index
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function index()
    {
        try {
            $paginator = DependencyRepository::get(PaginationProvider::class);

            $paginator->setData(
                DependencyRepository::get(InvoiceRepository::class)->fetchAll(
                    $paginator->getLimit(),
                    $paginator->getOffset()
                )
            );

            $response = [
                'invoices' => $paginator->getPage(),
                'currentPage' => $paginator->getOffset(),
                'pages' => $paginator->getCount(),
                'module' => self::MODULE_NAME,
            ];

            return view(self::MODULE_NAME, strtolower(self::MODULE_NAME), $response);
        } catch (\Exception $e) {
            die($e);
        }
    }

    /**
     * toggleStatus
     */
    public function toggleStatus()
    {
        try {
            if (!empty($_REQUEST['status']) && $this->validateInvoiceStatus($_REQUEST['status'])) {

                $status = $_REQUEST['status'];

                if (!empty($_REQUEST['invoice_id']) && $this->validateInvoiceId($_REQUEST['invoice_id'])) {
                    /** @var InvoiceEntity $entity */
                    $entity = DependencyRepository::get(InvoiceRepository::class)->fetchById($_REQUEST['invoice_id']);

                    $entity->setInvoiceStatus($status);

                    if (DependencyRepository::get(InvoiceRepository::class)->store($entity)) {
                        $response = [
                            'message' => 'Update successful!'
                        ];

                        return view(self::MODULE_NAME, 'update.'.strtolower(self::MODULE_NAME), $response);
                    }

                    throw new \Exception('Could not store updated invoice.');
                }

                throw new \Exception('Can not toggle status. Invoice ID parameter has not been provided.');
            }

            throw new \Exception('Can not toggle status. Status parameter has not been provided.');
        } catch (\Exception $e) {
            die($e);
        }
    }

    /**
     * validateInvoiceStatus
     *
     * @param string $status
     *
     * @return bool
     *
     * @throws \Exception
     */
    private function validateInvoiceStatus(string $status)
    {
        if (in_array($status, ['paid', 'unpaid'])) {
            return true;
        }

        throw new \Exception('Provided invoice status value is invalid. Should be either paid or unpaid.');
    }

    /**
     * validateInvoiceId
     *
     * @param $id
     *
     * @return bool
     *
     * @throws \Exception
     */
    private function validateInvoiceId($id)
    {
        if (is_numeric($id)) {
            return true;
        }

        throw new \Exception('Provided invoice ID value is invalid. Should be an integer.');
    }
}
