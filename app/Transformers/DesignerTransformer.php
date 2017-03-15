<?php namespace MyTailor\Transformers;


class DesignerTransformer extends Transformer
{

    /**
     * @param $designer
     * @return array
     */
    public function transform($designer)
    {

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

    }

}