<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Traits\GeneralTrait;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;

class AuthController extends Controller
{

    use GeneralTrait;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login' , 'register']]);
        return view('webfiles.register');
    }

   
    public $tokenBoolean = true;

    public function register(Request $request)
    {

        try {

            $rules = [
               'email' => 'required|string|email|max:255|unique:users',
               'password' => 'required|string|min:8',
            ];
            
            $validator = Validator::make($request->all() , $rules);

            if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator); //this function in generalTrait
                // return $this->returnValidationError($code , $validator); //this function in generalTrait
                return $this->returnValidationError($code , $validator); //this function in generalTrait
            }

            do {
                $pocket_number = rand(1000, 2000);
            } while (User::where('pocket_number', $pocket_number)->exists());

            $user = User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'pocket_number' => $pocket_number,
                'pocket_value' => rand(1000,2000),
                'maingoal_id' => 1
            ]);
        
            
            if ($this->tokenBoolean) {
                $token = JWTAuth::fromUser($user); //this is return the token
                $user['token'] = $token;
                $user->tokens()->create([
                    'name' => 'UserToken',
                    'tokenable_id' => $user['id'],
                    'tokenable_type' => get_class($user),
                    'token' => hash('sha256', $token),
                    'abilities' => ['*']
                ]);
            }
            
            return $this->returnData('User_Data' , $user , 'User register is successfully');
        }
        catch(\Exception $ex){
            return $this->returnError($ex->getCode() , $ex->getMessage());
        }
    }

    
    
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $token = auth()->attempt($credentials);
        if (!$token) {
            return $this->returnError(401 , 'Unauthorized');
        }

        $user = auth()->user();
        $userdata = [
            'email' => $user->email,
            'password' => $user->password,
            'token' => $token
        ];

        return $this->returnData('User_Data', $userdata,'User login is successfully' );

        // return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return $this->returnSuccessMessage( 200 , 'Successfully logged out' );
    }

}