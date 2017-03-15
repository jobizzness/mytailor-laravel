<?php namespace MyTailor\Transformers;


class DesignerShotTransformer extends Transformer
{

    /**
     * @param $designer
     * @return array
     */
    public function transform($designer)
    {

        $raw = [

            "id" => $designer->user_id,
            "joined_on" => $designer->created_at,
            "display_name" => $designer->user->profile->display_name,
            "username" => $designer->user->profile->username,
            "bio" => $designer->bio,
            "following" => true,
            "liked" => true,
            "like_count" => 30,
            "share_count" => 40,
            "avatar" => [
                "avatar_large" => $designer->user->profile->avatar,
                "avatar_small" => $designer->user->profile->avatar
            ],
            "shots" => []

        ];

        foreach($designer->user->shots as $shot){
            $raw['shots'][] = [

                "id" => $shot->id,
                "image" => $shot->image->medium,
                "file_name" => $shot->file_name,
                "alt" => str_replace(' ', '-', $shot->present()->title())
            ];
        }

        return $raw;

    }

}