<?php


namespace MyTailor\Modules\Users\Registration;


class RegisterUserCommand
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $roleID;

    /**
     * RegisterUserCommand constructor.
     *
     * @param $first_name
     * @param $last_name
     * @param $email
     * @param $password
     * @param $roleID
     */
    public function __construct($first_name, $last_name, $email, $password, $roleID) {

        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->roleID = $roleID;
    }
}