<?php

namespace MyTailor\Modules\Traits;

use MyTailor\Transformers\UserTransformer;
use Tymon\JWTAuth\Facades\JWTAuth;

trait AuthResponder
{
    /**
     * @property  token
     */
    public $token;

    public function userHasLoggedIn($user){

        $this->createToken($user);

        if($this->request->wantsJson() || $this->request->ajax()){
            return $this->responder($user);
        }

        return redirect()->intended('/');
    }

    /**
     * @param UserTransformer $transformer
     * @param $user
     * @return mixed
     */
    protected function responder(UserTransformer $transformer, $user)
    {
        if (!$user) {
            //we have no shots sorry.
            return $this->NotFound('Sorry ! there was an error with the processing');
        }

        //means we have shots so lets send them through.
        return $this->respond([
            'response' => [
                'user' => [
                    'data' => $transformer->transform($user),
                    'token' => $this->token
                ]
            ]
        ]);
    }

    private function createToken($user)
    {
        $this->token = JWTAuth::fromUser($user);
    }
}