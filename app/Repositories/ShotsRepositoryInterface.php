<?php
namespace MyTailor\Repositories;

interface ShotsRepositoryInterface
{

    /**
     * Gets shots and orders by the date desc.
     * Accepts a number for limiting amount of records
     *
     * @param $limit
     * @return mixed
     */
    public function newest($limit);
}