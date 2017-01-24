<?php
namespace MyTailor\Presenters\Posts;

use Laracasts\Presenter\Presenter;

class PostPresenter extends Presenter {

    public function publishedDate()
    {
        if($this->published_at) {
            return $this->published_at->diffForHumans();
        }

        return 'Not Published';
    }

}