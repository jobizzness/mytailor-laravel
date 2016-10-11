<?php


namespace MyTailor\Modules\Shots;


use Laracasts\Commander\CommandHandler;
use MyTailor\Modules\Shots\Events\ShotWasViewed;
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
            $shot->comments->total = count($shot->comments);

            $shot->raise(new ShotWasViewed($shot));

            return $shot;

        }
        return null;

    }

    /**
     * Gets the profile associated with a shot.
     *
     * @param $shot
     */
    protected function getPublishableProfile($shot)
    {
        $shot->publishable->profile = Profile::find([$shot->publishable->profile_id])->first();

    }

    /**
     * Gets the profile associated with a comment.
     *
     * @param $shot
     */
    private function getCommentPublishableProfile($shot)
    {
        foreach($shot->comments as $comment) {

            $comment->publishable->Profile = Profile::find([$comment->publishable->profile_id])->first();
        }

    }

}