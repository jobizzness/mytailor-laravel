<?php

namespace MyTailor\Http\Controllers\Auth;

use Illuminate\Http\Request;
use MyTailor\Http\Controllers\Frontend\ApiController;
use MyTailor\Modules\Traits\AuthResponder;
use MyTailor\Modules\Users\AuthenticateUser;

class SocialAuthController extends ApiController
{
    use AuthResponder;

    /**
     * Redirect user to login.
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

}
