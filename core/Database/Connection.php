<?php

namespace Core\Database;

use PDO;
use PDOException;

/**
 * Class Connection
 *
 * @namespace Core\Database
 */
class Connection
{
    /**
     * make
     *
     * @param $config
     *
     * @return PDO
     */
    public static function make($config)
    {
        try {
            return new PDO(
                $config['connection'].';dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
