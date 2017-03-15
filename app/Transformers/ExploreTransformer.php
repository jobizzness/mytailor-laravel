<?php namespace MyTailor\Transformers;


use Carbon\Carbon;

class ExploreTransformer extends Transformer
{

    /**
     * @param $exploredItems
     * @return array
     */
    public function transform($exploredItems)
    {

        return [
          'designers' => $this->transformDesignersCollection($exploredItems['designers']),
          'collections' => $this->transformCollectionsCollection($exploredItems['collections']),
          'shots' => $this->transformshotsCollection($exploredItems['shots'])
        ];

    }

    /**
     * @param $designers
     * @return mixed
     */
    private function transformDesignersCollection($designers)
    {
        return $designers->transform(function($designer){

            return [

                "id" => $designer->user_id,
                "joined_on" => $designer->created_at,
                "display_name" => $designer->user->profile->display_name,
                "username" => $designer->user->profile->username,
                "bio" => $designer->bio,
                "avatar" => [
                    "avatar_large" => $designer->user->profile->avatar,
                    "avatar_small" => $designer->user->profile->avatar
                ]

            ];

        });
    }

    /**
     * @param $collections
     * @return mixed
     */
    private function transformCollectionsCollection($collections)
    {
        return $collections->transform(function($collection){

            return [
                'title' => $collection->title,
                'description' => $collection->description,
                'slug' => $collection->slug,
                'time' =>$collection->published_at,
                'image'=> $collection->image
            ];

        });
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

    private function transformshotsCollection($shots)
    {
        return $shots->transform(function($shot){

            return [
                "id" => $shot->id,
                "description" => $shot->description,
                "title" => $shot->present()->title(),
                "name" => $shot->file_name,
                "featured" => $shot->featured,
                "views" => $shot->views,
                "source" => $shot->source_url,
                "time" => $this->prettyDate($shot->published_at),
                "category" => $shot->category,
                "alt" => str_replace(' ', '-', $shot->present()->title()),

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

        });
    }
}