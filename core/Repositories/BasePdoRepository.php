<?php

namespace Core\Repositories;

use Core\Entities\BaseEntity;

/**
 * Class BasePdoRepository
 *
 * @namespace Core\Repositories
 */
class BasePdoRepository extends AbstractPdoRepository
{
    /**
     * fetchAll
     *
     * @return mixed|void
     *
     * @throws \Exception
     */
    public function fetchAll()
    {
        throw new \Exception('This method has not been implemented yet.');
    }

    /**
     * fetchById
     *
     * @param int $id
     *
     * @return mixed|void
     *
     * @throws \Exception
     */
    public function fetchById(int $id)
    {
        throw new \Exception('This method has not been implemented yet.');
    }

    /**
     * store
     *
     * @param BaseEntity $entity
     *
     * @return mixed|void
     *
     * @throws \Exception
     */
    public function store(BaseEntity $entity)
    {
        throw new \Exception('This method has not been implemented yet.');
    }
}
