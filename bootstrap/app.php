<?php

require __DIR__.'/../vendor/autoload.php';

use Core\{Kernel, Router, Request};

(new Kernel());

try {
    Router::load(__DIR__.'/../app/routes.php')->direct(Request::uri(), Request::method());
} catch (Exception $e) {
    die ($e->getMessage());
}
