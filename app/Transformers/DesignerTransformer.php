<?php namespace MyTailor\Transformers;


class DesignerTransformer extends Transformer
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
            "avatar" => [
                "avatar_large" => $designer->user->profile->avatar,
                "avatar_small" => $designer->user->profile->avatar
            ],
            "shots" => []

        ];

       foreach($designer->user->shots as $shot){

           $raw['shots'][] = [
               "id" => $shot->id,
               "description" => $shot->description,
               "name" => $shot->file_name,
               "featured" => $shot->featured,
               "views" => $shot->views,
               "source" => $shot->source_url,
               "time" => null,
               "category" => $shot->category,
               "alt" => str_replace(' ', '-', $shot->alt),
               "image" => [
                   "original" => $shot->image->original,
                   "small" => $shot->image->small,
                   "medium" => $shot->image->medium,
                   "large" => $shot->image->large,
                   "small" => $shot->image->small
               ],
               "likes" => [
                   "like_count" => $shot->LikesCount,
//                   "data" => [
//                       $shot->tags
//                   ],
               ]
           ];


       }
        return $raw;
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