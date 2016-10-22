<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function authenticate(Request $request)
    {
        $credentails = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentails);

        try {
            if (!$token) {
              return $this->response->error('Hey, what do you think you are doing!?', 401);
              //return $this->response->error('Hey, what do you think you are doing!?', 418);
            }
        } catch (JWTException $error) {
            return $this->response->internalServerError();
        }

        return $this->response->array(compact('token'));
    }
}
