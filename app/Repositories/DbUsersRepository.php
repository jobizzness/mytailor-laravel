<?php


namespace MyTailor\Repositories;

use Laracasts\Commander\Events\EventGenerator;
use MyTailor\User;

class DbUsersRepository implements UsersRepositoryInterface
{
    use EventGenerator;
    /**
     * Find a user by email or create.
     *
     * @param $userData
     * @return User
     */
    public function findByEmailOrCreate($userData)
    {

        $user = User::where('email', $userData->email)->first();

        if(! $user){
            $userData->username = 'Afrodapp User';
            $userData->password = Null;

            $user = $this->create($userData);

        }

        return $user;

    }

    /**
     * creates the new user.
     *
     * @param $userData
     * @return User
     */
    public function create($userData)
    {
       $user =  User::register( $userData, 'member');

        return $user;
    }
}