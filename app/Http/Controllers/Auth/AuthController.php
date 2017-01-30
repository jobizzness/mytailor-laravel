<?php

namespace MyTailor\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Laracasts\Commander\CommandBus;
use MyTailor\Modules\Core\Flash\Flasher;
use MyTailor\Modules\Users\AuthenticateUser;
use MyTailor\Modules\Users\Registration\RegisterUserCommand;
use Validator;
use MyTailor\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class AuthController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * Create a new authentication controller instance.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;

        $this->redirectAfterLogout = route('auth.login');
        $this->redirectTo = route('admin.dashboard');
        $this->registerWizard = '/register/wizard';

        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register($request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        extract($request->only('username', 'email', 'password'));

        $command = new RegisterUserCommand($username, $email, $password, $avatar = null);
        $this->commandBus->execute($command);

    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {

        return $this->login($request);
    }


    public function username()
    {
        return 'username';
    }

    /**
     * Registers a new user.
     *
     * @param Request $request
     * @return Redirect user.
     */
    public function getRegister(Request $request)
    {

        return view('auth.register');
    }

    /**
     * Registers a new user.
     *
     * @param Request $request
     * @return Redirect user.
     */
    public function postRegister(Request $request)
    {
        $this->register($request);

        Flasher::flash('info', 'Welcome To MyTailorAfrica', true);
        return redirect('/shots');
    }

    /**
     * Redirect user to login to thirdparty.
     *
     * @param null $provider
     * @param AuthenticateUser $authenticateUser
     * @param Request $request
     * @return mixed
     */
    public function getSocialAuth($provider = null, AuthenticateUser $authenticateUser, Request $request)
    {
        if (!config("services.$provider")) abort('404');

        return $authenticateUser->execute($provider, $request->has('code'), $this);
    }

    public function userHasLoggedIn($user){

        return redirect('/');
    }

}
