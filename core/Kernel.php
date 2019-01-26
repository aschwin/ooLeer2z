<?php

namespace Core;

use App\Providers\PaginationProvider;
use Core\Repositories\DependencyRepository;
use Core\Database\Connection;
use App\Invoices\Repositories\InvoiceRepository;
use App\Invoices\Repositories\PdoInvoiceRepository;
use App\Transactions\Repositories\PdoTransactionRepository;
use App\Transactions\Repositories\TransactionRepository;

/**
 * Class Kernel
 *
 * @namespace Core
 */
class Kernel
{
    /**
     * Kernel constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        DependencyRepository::bind('database.config', require __DIR__.'/../config/database.php');
        DependencyRepository::bind('pagination.config', require __DIR__.'/../config/pagination.php');
        DependencyRepository::bind(InvoiceRepository::class, new PdoInvoiceRepository(
            Connection::make(DependencyRepository::get('database.config'))
        ));
        DependencyRepository::bind(TransactionRepository::class, new PdoTransactionRepository(
            Connection::make(DependencyRepository::get('database.config'))
        ));
        DependencyRepository::bind(PaginationProvider::class, new PaginationProvider(
            DependencyRepository::get('pagination.config')
        ));
    }
}
