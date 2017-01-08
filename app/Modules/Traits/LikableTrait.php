<?php


namespace MyTailor\Modules\Traits;


use Illuminate\Support\Facades\Auth;
use MyTailor\Like;

trait LikableTrait
{

    /**
     * @return mixed
     */
    public function like()
    {
        $like = new Like(['user_id' => Auth::id()]);
        
        return $this->likes()->save($like);
    }

    /**
     *
     */
    public function unlike()
    {
        $this->likes()->where('user_id', Auth::id())->delete();
    }

    /**
     * @return bool
     */
    public function isLiked()
    {
        return !! $this->likes()
            ->where('user_id', Auth::id())
            ->count();
    }

    /**
     * @return mixed|void
     */
    public function toggle()
    {
        if ($this->isLiked()) {
            return $this->unlike();
        }

        return $this->like();
    }

    /**
     * @return mixed
     */
    public function getLikesCountAttribute()
    {
        $count = $this->likes()->count();
        if($count > 0){
            return $count;
        }
        return null;
    }
}