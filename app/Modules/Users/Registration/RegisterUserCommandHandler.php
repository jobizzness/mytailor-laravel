<?php


namespace MyTailor\Modules\Users\Registration;

use Laracasts\Commander\CommandHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laracasts\Commander\Events\DispatchableTrait;
use MyTailor\Repositories\UsersRepositoryInterface;

class RegisterUserCommandHandler implements CommandHandler
{
    use AuthenticatesAndRegistersUsers, DispatchableTrait;

    /**
     * @var UsersRepositoryInterface
     */
    private $users;

    /**
     * RegisterUserCommandHandler constructor.
     * @param UsersRepositoryInterface $users
     */
    public function __construct(UsersRepositoryInterface $users)
    {

        $this->users = $users;
    }
    /**
     * Handles registering a new user.
     *
     * @param $command
     * @return mixed
     */
    public function handle($command) {

        //Try to create the user and if successful return the user object
        $user = $this->create($command);


        if($user){
            // If User object exists then Log them IN
            Auth::guard($this->getGuard())->login($user);
        }

        //Fire off any events
        $this->dispatchEventsFor($user);

        return $user;

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param $data
     * @return User
     * @internal param array $data
     */
    protected function create($data)
    {
        return $this->users->create($data);

    }


}