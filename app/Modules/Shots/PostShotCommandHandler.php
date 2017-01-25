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
    public function handle($command)
    {

        // if Auth user in no user then it must be a brand or spam
        // if user type is not brand then Respond with error

        // If user type is brand then check if user has permission

        //if they do then upload the file

//        $image = $imageServer->upload($file);



        $shot = $this->shots->post($command->publishable_type, $command->publishable_id, $command->published_by, $command->image);

        $this->dispatchEventsFor($shot);

    }


}