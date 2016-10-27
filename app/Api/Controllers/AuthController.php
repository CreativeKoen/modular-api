<?php

namespace Api\Controllers;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends ApiBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'logout']);
    }

    public function authenticate(Request $request)
    {
        $credentails = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentails);

        try {
            if (!$token) {
              return $this->response->error('Hey, what do you think you are doing!?', 401);
            }
        } catch (JWTException $error) {
            return $this->response->internalServerError();
        }

        return $this->response->array(compact('token'));
    }

    public function refreshToken()
    {
        $token = JWTAuth::getToken();

        if (!$token) {
            return $this->response->errorUnauthorized("Your Token is invalid!");
        }

        try {
            $refreshToken = JWTAuth::refresh($token);
        } catch (JWTException $error) {
            return $this->response->internalServerError();
        }

        return $this->response->array(compact('refreshToken'));
    }

    public function getCurrentUser()
    {
        $user = JWTAuth::parseToken()->toUser();

        try {
            if(!$user) {
                return $this->response->errorNotFound('User Not Found!');
            }
        } catch (JWTException $error) {
            return $this->response->error('This should not happen!')->setStatusCode(418);
        }

        return $this->response->array(compact('user'))->setStatusCode(200);
    }
}
