<?php namespace MyTailor\Modules\Shots;


use Laracasts\Commander\CommandHandler;
use MyTailor\Repositories\ShotsRepositoryInterface;
use Laracasts\Commander\Events\DispatchableTrait;

class PostShotCommandHandler implements CommandHandler {

    use DispatchableTrait;
    /**
     * @var ShotsRepositoryInterface
     */
    private $shots;

    /**
     * PostShotCommandHandler constructor.
     *
     * @param ShotsRepositoryInterface $shots
     */
    public function __construct(ShotsRepositoryInterface $shots)
    {

        $this->shots = $shots;
    }
    /**
     * Post a shot and release events
     * @param $command
     * @return mixed
     */
    public function handle($command){

        $shot = $this->shots->post($command->file_name, $command->publishable_type, $command->publishable_id, $command->published_by);

        $this->dispatchEventsFor($shot);

    }


}