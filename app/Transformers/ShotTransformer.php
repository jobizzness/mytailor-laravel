<?php namespace MyTailor\Transformers;


use Carbon\Carbon;

class ShotTransformer extends Transformer
{

    /**
     * @param $shot
     * @return array
     */
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
            "time" => $this->prettyDate($shot->published_at),
            "category" => $shot->category,
            "alt" => str_replace(' ', '-', $shot->alt),

            "owner" => [

                "display_name" => $shot->publishable->profile->display_name,
                "username" => $shot->publishable->profile->username,
                "id"=> $shot->publishable_id,
                "type" => $shot->publishable_type,

                "avatar" => [
                        "avatar_large" => $shot->publishable->profile->avatar,
                        "avatar_small" => $shot->publishable->profile->avatar
                ]

            ],
            "likes" => [
                "is_liked" => $shot->isLiked(),
                   "like_count" => $shot->LikesCount,
//                   "data" => [
//                       $shot->tags
//                   ],
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

    /**
     * @param $value
     * @return string
     */
    public function prettyDate($value)
    {
        $diffForHumans = Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();

        $data = explode(" ", $diffForHumans);
        $number = $data[0];
        $denominator = substr($data[1], 0, 1);

        return $number . $denominator;
    }

}