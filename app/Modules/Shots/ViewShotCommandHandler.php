<?php


namespace MyTailor\Modules\Shots;


use Laracasts\Commander\CommandHandler;
use MyTailor\Repositories\DbShotsRepository;
use MyTailor\Profile;

class ViewShotCommandHandler implements CommandHandler
{

    /**
     * @var DbShotsRepository
     */
    private $shots;


    public function __construct(DbShotsRepository $shots)
    {

        $this->shots = $shots;
    }


    public function handle($command)
    {
        $shot = $this->shots->findByName($command->name);

        if($shot) {

            $shot->comments();
            $this->getPublishableProfile($shot);
            $this->getCommentPublishableProfile($shot);

            $shot->related = $this->shots->related($shot);
            $shot->date = $shot->created_at->diffForHumans();

            return $shot;

        }
        return null;

    }

    /**
     * Revisit this method
     * @param $shot
     */
    protected function getPublishableProfile($shot)
    {
        $shot->publishable->profile = Profile::find([$shot->publishable->profile_id])->first();

    }

    private function getCommentPublishableProfile($shot)
    {
        foreach($shot->comments as $comment) {
            
            $comment->publishable->Profile = Profile::find([$comment->publishable->profile_id])->first();
        }
    }

}