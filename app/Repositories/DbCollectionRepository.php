<?php namespace MyTailor\Repositories;


use MyTailor\Collection;

class DbCollectionRepository implements CollectionRepositoryInterface
{

    /**
     * @param $slug
     * @return mixed
     */
    public function find($slug)
    {

        $collection = Collection::whereSlug($slug)->first();
        $collection->shots = $collection->paginateShots();

        return $collection;

    }

}