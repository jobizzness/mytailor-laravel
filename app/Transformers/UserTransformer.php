<?php


namespace MyTailor\Transformers;


class UserTransformer extends Transformer
{

    public function transform($user)
    {
        return [

            "id" => $user->user_id,
            "joined_on" => $user->created_at,
            "display_name" => $user->profile->display_name,
            "username" => $user->profile->username,
            "bio" => $user->bio,
            "avatar" => [
                "avatar_large" => $user->profile->avatar,
                "avatar_small" => $user->profile->avatar
            ]

        ];
    }
}