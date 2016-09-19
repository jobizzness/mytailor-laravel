<?php namespace MyTailor\Modules\Shots;


use Laracasts\Commander\CommandHandler;
use MyTailor\Repositories\ShotsRepositoryInterface;


class PostShotCommandHandler implements CommandHandler {

    /**
     * @var ShotsRepositoryInterface
     */
    private $shots;

    /**
     * PostShotCommandHandler constructor.
     * @param ShotsRepositoryInterface $shots
     */
    public function __construct(ShotsRepositoryInterface $shots)
    {

        $this->shots = $shots;
    }
    /**
     * @param $command
     * @return mixed
     */
    public function handle($command){

        $this->shots->post($command->file_name, $command->publishable_type, $command->publishable_id, $command->published_by);

    }


}