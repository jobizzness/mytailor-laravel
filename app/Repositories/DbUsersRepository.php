<?php


namespace MyTailor\Repositories;

use Laracasts\Commander\Events\EventGenerator;
use MyTailor\Profile;
use MyTailor\User;

class DbUsersRepository implements UsersRepositoryInterface
{
    use EventGenerator;
    /**
     * Find a user by email or create.
     *
     * @param $data
     * @return User
     */
    public function findByEmailOrCreate($data)
    {


        $user = User::where('email', $data->email)->first();

        if(! $user){
            $data->username = $data->nickname;
            $data->password = Null;

            $user = $this->create($data);

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
       $user =  User::register($userData);

        return $user;
    }

    public function getProfile($id)
    {
        return Profile::where('username', $id)->first();
    }
}