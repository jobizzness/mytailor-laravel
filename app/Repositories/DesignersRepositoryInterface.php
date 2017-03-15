<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 8/23/2016
 * Time: 2:34 PM
 */

namespace MyTailor\Repositories;


interface DesignersRepositoryInterface
{
    /**
     * @param $limit
     * @return mixed
     */
    public function newest($limit);

}