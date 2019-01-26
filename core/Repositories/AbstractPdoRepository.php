<?php

namespace Core\Repositories;

use Core\Entities\BaseEntity;
use PDO;

/**
 * Class AbstractPdoRepository
 *
 * @namespace Core\Repositories
 */
abstract class AbstractPdoRepository implements Repository
{
    /**
     * @var PDO $pdo
     */
    protected $pdo;

    /**
     * QueryBuilder constructor.
     *
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * fetchAll
     *
     * @return mixed
     */
    abstract public function fetchAll();

    /**
     * fetchById
     *
     * @param int $id
     *
     * @return mixed
     */
    abstract public function fetchById(int $id);

    /**
     * store
     *
     * @param BaseEntity $entity
     *
     * @return mixed
     */
    abstract public function store(BaseEntity $entity);
}
