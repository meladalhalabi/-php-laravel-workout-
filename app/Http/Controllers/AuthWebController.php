<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Traits\GeneralTrait;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;


class AuthWebController extends Controller
{
    use GeneralTrait;

    public $tokenBoolean = true;

    public function registerWeb(Request $request)
    {

        try {

            $rules = [
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator); //this function in generalTrait
                return view('webfiles.error', ['Msg' => $validator->errors()->first(), 'Code' => $code , 'Route'=>'']);
            }

            do {
                $pocket_number = rand(1000, 2000);
            } while (User::where('pocket_number', $pocket_number)->exists());

            $user = User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'pocket_number' => $pocket_number,
                'pocket_value' => rand(1000, 2000),
                'maingoal_id' => 1
            ]);


            if ($this->tokenBoolean) {
                $token = JWTAuth::fromUser($user); //this is return the token
                $user['token'] = $token;
                $user->tokens()->create([
                    'name' => 'UserToken',
                    'tokenable_id' => $user['id'],
                    'tokenable_type' => get_class($user),
                    'token' => hash('sha256',$token),
                    'abilities' => ['*']
                ]);
            }

            return view('webfiles.user', ['user' => $user , 'Msg' => 'User register is successfully']);
        } catch (\Exception $ex) {
            return view('webfiles.error', ['Msg' => $ex->getMessage(), 'Code' => $ex->getCode() , 'Route' => '']);
        }
    }


    public function loginWeb(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $token = auth()->attempt($credentials);
        if (!$token) {
            return view('webfiles.error' , ['Msg' => 'Unauthorized' , 'Code' => 401 , 'Route' => 'login']);
        }

        $user = auth()->user();
        $userdata = [
            'email' => $user->email,
            'password' => $user->password,
            'token' => $token
        ];

        return view('webfiles.home', ['Msg' => 'Successfully logged out', 'Code' => 200]);

    }


    public function logout()
    {
        auth()->logout();
        return $this->returnSuccessMessage(200, 'Successfully logged out');
        return view('webfiles.error', ['Msg' => 'Successfully logged out' , 'Code' => 200, 'Route' => 'register']);
    }
}
