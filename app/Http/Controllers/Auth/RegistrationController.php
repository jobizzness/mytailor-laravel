<?php

namespace MyTailor\Http\Controllers\Auth;

use Illuminate\Http\Request;

use MyTailor\Http\Controllers\Frontend\ApiController;
use MyTailor\Http\Requests;
use MyTailor\Modules\Traits\AuthResponder;
use MyTailor\Modules\Traits\CommandBus;
use MyTailor\Modules\Users\Registration\RegisterUserCommand;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

class RegistrationController extends ApiController
{
    use AuthResponder;

    use CommandBus;
    /**
     * @var Request
     */
    private $request;


    /**
     * Create a new authentication controller instance.
     * @param Request $request
     */
    public function __construct(Request $request)
    {

        $this->middleware('guest');
        $this->request = $request;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validator = $this->validator($this->request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $this->request, $validator
            );
        }

        extract($this->request->only('first_name', 'last_name', 'email', 'password'));
        $command =  new RegisterUserCommand($first_name, $last_name, $email, $password, 4);


        $user = $this->execute($command);

        return $this->userHasLoggedIn($user);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }


}
