<?php

namespace Core\Repositories;

use Core\Entities\BaseEntity;

/**
 * Interface Repository
 *
 * @namespace Core\Repositories
 */
interface Repository
{
    /**
     * fetchAll
     *
     * @return mixed
     */
    public function fetchAll();

    /**
     * fetchById
     *
     * @param int $id
     *
     * @return mixed
     */
    public function fetchById(int $id);

    /**
     * store
     *
     * @param BaseEntity $entity
     *
     * @return mixed
     */
    public function store(BaseEntity $entity);
}
