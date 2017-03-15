<?php


namespace MyTailor\Transformers;


class CollectionTransformer extends Transformer
{

    public function transform($collection)
    {
        return [
            'title' => $collection->title,
            'description' => $collection->description,
            'slug' => $collection->slug,
            'time' =>$collection->published_at,
            'image'=> $collection->image
        ];
    }

}