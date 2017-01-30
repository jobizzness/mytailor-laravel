<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use MyTailor\User;

class Functional extends \Codeception\Module
{

    public function haveAnAccount($overwrite)
    {
        $first_name = 'johnny';
        $last_name = 'sniper';
        $email = 'sniping@snipe.com';
        $password='jobiie23';
        $roleID=4;

        if($overwrite){
            extract($overwrite);
        }

        $user = (object) [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => $password,
            'roleID' => $roleID
        ];


        $user = User::register($user);
    }
}
