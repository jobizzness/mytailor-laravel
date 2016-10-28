<?php namespace MyTailor\Repositories;


interface CollectionRepositoryInterface
{

    /**
     * @param $slug
     * @return mixed
     */
    public function find($slug);

}