<?php

namespace App\Transactions\Controllers;

use App\Transactions\Repositories\TransactionRepository;
use Core\Repositories\DependencyRepository;

/**
 * Class TransactionController
 *
 * @namespace App\Transactions\Controllers
 */
class TransactionController
{
    /**
     * export
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function export()
    {
        $transactions = DependencyRepository::get(TransactionRepository::class)->fetchAll();

        $export = [
            '0'=> [
                'invoice_id' => 'Invoice ID',
                'company_name' => 'Company Name',
                'invoice_amount' => 'Invoice Amount',
            ],
        ];

        foreach ($transactions as $transaction) {
            $export[] = [
                'invoice_id' => $transaction->getInvoiceId(),
                'company_name' => $transaction->getCompanyName(),
                'invoice_amount' => $transaction->getInvoiceAmount(),
            ];
        }

        return export('transactions', $export);
    }
}
