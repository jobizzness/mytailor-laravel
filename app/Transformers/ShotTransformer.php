<?php namespace MyTailor\Transformers;


class ShotTransformer extends Transformer
{

    public function transform($shot)
    {

        return [

            "id" => $shot->id,
            "title" => $shot->title,
            "description" => $shot->description,
            "name" => $shot->file_name,
            "featured" => $shot->featured,
            "views" => $shot->views,
            "source" => $shot->source_url,
            "created_at" => $shot->created_at,
            "category" => $shot->category,

            "owner" => [

                "username" => $shot->publishable->profile->username,
                "id"=> $shot->publishable_id,
                "type" => $shot->publishable_type,

                "avatar" => [
                        "avatar_large" => $shot->publishable->profile->avatar,
                        "avatar_small" => $shot->publishable->profile->avatar
                ]

            ],
            "tags" => [
                   "uri" => "/",
                   "data" => [
                       $shot->tags
                   ],
            ],

            "comments" => [
                    "uri" => "/",
                    "data" => [
                        $shot->comments
                    ],
            ],

            "image" => [
                "original" => $shot->image->original,
                "small" => $shot->image->small,
                "medium" => $shot->image->medium,
                "large" => $shot->image->large,
                "small" => $shot->image->small
            ]

        ];


    }

}