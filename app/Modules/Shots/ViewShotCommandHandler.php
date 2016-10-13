<?php namespace MyTailor\Modules\Shots;

use Laracasts\Commander\CommandHandler;
use MyTailor\Modules\Shots\Events\ShotWasViewed;
use MyTailor\Repositories\DbShotsRepository;

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


    /**
     * @param $command
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function handle($command)
    {
        $shot = $this->shots->findByName($command->name);

        if($shot) {
            $shot->with('comments', 'publishable.profile');
            $shot->raise(new ShotWasViewed($shot));

          return $shot;

        }
    }


}