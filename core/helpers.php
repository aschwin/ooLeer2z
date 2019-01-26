<?php

/**
 * view
 *
 * @param string $module
 * @param string $view
 * @param array  $response
 *
 * @return mixed
 */
function view(string $module, string $view, array $response = [])
{
    return require __DIR__."/../app/{$module}/Views/{$view}.view.php";
}

/**
 * export
 *
 * @param string $name
 * @param array  $data
 */
function export(string $name, array $data = [])
{
    $output = '';

    foreach ($data as $row) {
        $output .= '"'.implode('","', $row).'"'.PHP_EOL;
    }

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export-'.$name.'-'.date('Y-m-d_His').'.csv"');
    header('Content-Length: ' . strlen($output));
    header('Connection: close');

    echo $output;
}
