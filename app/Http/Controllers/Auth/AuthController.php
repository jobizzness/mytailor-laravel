<?php

namespace MyTailor\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use MyTailor\Http\Controllers\Frontend\ApiController;
use MyTailor\Modules\Traits\AuthResponder;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;


class AuthController extends ApiController
{



    use AuthResponder;

    use AuthenticatesUsers;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
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

        $this->redirectAfterLogout = route('auth.login');
        $this->redirectTo = route('admin.dashboard');

        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->request = $request;
    }

    public function getLogin()
    {
        return $this->showLoginForm();
    }

    /**
     * Handle a login request to the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin()
    {
        return $this->login($this->request);
    }


    /**
     * @param $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function authenticated($request, $user)
    {
        return $this->userHasLoggedIn($user);
    }

}