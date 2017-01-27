<?php namespace MyTailor\Modules\Shots;


use Laracasts\Commander\CommandHandler;
use MyTailor\Brand;
use MyTailor\Modules\Core\Images\ImageServer;
use MyTailor\Repositories\ShotsRepositoryInterface;
use Laracasts\Commander\Events\DispatchableTrait;

class PostShotCommandHandler implements CommandHandler {

    use DispatchableTrait;
    /**
     * @var ShotsRepositoryInterface
     */
    private $shots;
    /**
     * @var ImageServer
     */
    private $imageServer;

    /**
     * PostShotCommandHandler constructor.
     *
     * @param ShotsRepositoryInterface $shots
     * @param ImageServer $imageServer
     */
    public function __construct(ShotsRepositoryInterface $shots, ImageServer $imageServer)
    {

        $this->shots = $shots;
        $this->imageServer = $imageServer;
    }
    /**
     * Post a shot and release events
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $validated = $this->validateUser($command);

       // if($validated){

            $image = $this->imageServer->upload($command->image);

            $shot = $this->shots->post($command->publishable_type, $command->publishable_id,
                $command->published_by, $image);


            $this->dispatchEventsFor($shot);
        //}

       // return false;
    }

    /**
     * Checks if Its a user or a Brand
     *
     * @param $command
     * @return bool
     */
    private function validateUser($command)
    {
        if($command->publishable_id != $command->published_by){

            // Hmm does this user have permission to post as the brand
            return $this->userHasPermission($command->publishable_id, $command->published_by);

        }

        return false;
    }

    /**
     * @param $publishable_id
     * @param $published_by
     * @return bool
     */
    private function userHasPermission($publishable_id, $published_by)
    {
       $brand = Brand::find($publishable_id);

        if($brand){
           return $brand->checkUserHasPermissions($published_by);
        }

        return false;
    }


}