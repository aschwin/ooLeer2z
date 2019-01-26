<?php

$router->get('', 'App\Invoices\Controllers\InvoiceController@index');
$router->get('invoices', 'App\Invoices\Controllers\InvoiceController@index');
$router->get('invoices/toggle-status', 'App\Invoices\Controllers\InvoiceController@toggleStatus');
