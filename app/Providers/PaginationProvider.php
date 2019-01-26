<?php

namespace App\Providers;

/**
 * Class PaginationProvider
 *
 * @namespace App\Providers
 */
class PaginationProvider
{
    /**
     * @var array $data
     */
    private $data;
    /**
     * @var int $limit
     */
    private $limit;
    /**
     * @var int $offset
     */
    private $offset;

    /**
     * PaginationProvider constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->limit = !empty($_REQUEST['limit']) ? $_REQUEST['limit'] : $config['limit'];
        $this->offset = !empty($_REQUEST['offset']) ? $_REQUEST['offset'] : $config['offset'];
    }

    /**
     * setData
     *
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = array_chunk($data, $this->limit);
    }

    /**
     * getPage
     *
     * @return mixed|string
     *
     * @throws \Exception
     */
    public function getPage()
    {
        if (array_key_exists($this->offset - 1, $this->data)) {
            return $this->data[$this->offset - 1];
        }

        throw new \Exception('The given page doesn\'t exist!');
    }

    /**
     * getLimit
     *
     * @return mixed
     */
    public function getLimit()
    {
        return (int) $this->limit;
    }

    /**
     * getOffset
     *
     * @return mixed
     */
    public function getOffset()
    {
        return (int) $this->offset;
    }

    /**
     * getCount
     *
     * @return int
     */
    public function getCount()
    {
        return count($this->data);
    }
}
