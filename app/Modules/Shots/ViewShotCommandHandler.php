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
            $this->getProfile($shot);

            $shot->related = $this->shots->related($shot);

            return $shot;

        }
        return null;

    }

    /**
     * Revisit this method
     * @param $shot
     */
    protected function getProfile($shot)
    {
        $shot->publishable->profile = Profile::find([$shot->publishable->profile_id])->first();
        $shot->date = $shot->created_at->diffForHumans();
    }

}