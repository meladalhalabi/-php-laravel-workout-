<?php ////This controller with recourse

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use App\Models\All_Exercises;
use App\Models\Exercises;
use App\Models\MainGoals;
use App\Models\Reports;
use App\Models\Settings;
use App\Models\User;
use App\Models\UserExercise;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    use GeneralTrait;

    public function __construct(){
        $this->middleware('auth');
    }

    ///// enter weight and height of user
    public function Enter_Weight_height(Request $request)
    {

        try {

            $rules = [
                'weight' => 'required|numeric|max:200',
                'height' => 'required|numeric|max:250',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator); //this function in generalTrait and it will give me the code of error
                return $this->returnValidationError($code, $validator); //this return the code and message of validator
            }
            $user_id = auth()->user();            
            $tokenFound = JWTAuth::parseToken()->authenticate();

            if($tokenFound) {
                $weight_height = User::where('id' , $user_id->id)->update([
                    'weight' => $request->weight,
                    'height' => $request->height,
                ]);
            }
            return $this->returnSuccessMessage(200 , 'Add user weight and height is successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
    
    ///// enter the main goal of user
    public function EnterMainGoal(Request $request)
    {

        try {
            
            $tokenFound = JWTAuth::parseToken()->authenticate();
            $main_goal_id = MainGoals::where('id' , $request->id);
            $user_id = auth()->user(); 

            if($tokenFound && $main_goal_id) {
                $maingoal_id = User::where('id' , $user_id->id)->update([
                    'maingoal_id' => $request->id,
                ]);
            }
            return $this->returnSuccessMessage(200 , 'Add the main goal is successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
    
    ///// enter the focus area of the user and add setting with default values
    public function EnterFocusArea(Request $request)
    {
        
        try {
            
            $tokenFound = JWTAuth::parseToken()->authenticate();
            $exercise_id = Exercises::where('id' , $request->id);

            $user_id = auth()->user();
            if($tokenFound && $exercise_id && $user_id->id) {
                
                $setting = Settings::create([
                    'Rest_Time' => 25,
                    'CountDown_Time' => 15
                ]);
                
                UserExercise::create([
                    'exercise_id' => $request->id,
                    'user_id' => $user_id->id,
                    'setting_id' => $setting->id
                ]);
            }
            return $this->returnSuccessMessage(200 , 'Add Focus Area is successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    ///// determine the gender of user
    public function EnterGender(Request $request)
    {

        try {

            $rules = [
                'gender' => 'required|string|max:1',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator); //this function in generalTrait and it will give me the code of error
                return $this->returnValidationError($code, $validator); //this return the code and message of validator
            }
            
            $tokenFound = JWTAuth::parseToken()->authenticate();
            $user_id = auth()->user();
            if($tokenFound) {
                $gender = User::where('id' , $user_id->id)->update([
                    'gender' => $request->gender
                ]);
            }
            return $this->returnSuccessMessage(200 , 'Add user gender is successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    ///// add the language of app
    public function EnterLanguage(Request $request)
    {

        try {

            $rules = [
                'language' => 'required|string|max:1',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator); //this function in generalTrait and it will give me the code of error
                return $this->returnValidationError($code, $validator); //this return the code and message of validator
            }
            $user_id = auth()->user();
            $tokenFound = JWTAuth::parseToken()->authenticate();

            if($tokenFound) {
                $language = User::where('id' , $user_id->id)->update([
                    'language' => $request->language
                ]);
            }
            return $this->returnSuccessMessage(200 , 'Add user language is successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    // enter the level of user where the front will give me the user_id , exercise_id and the level
    public function EnterLevel(Request $request){

            try {

                $rules = [
                    'Level' => 'required|string|max:20',
                ];

                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    $code = $this->returnCodeAccordingToInput($validator); //this function in generalTrait and it will give me the code of error
                    return $this->returnValidationError($code, $validator); //this return the code and message of validator
                }
                
                $tokenFound = JWTAuth::parseToken()->authenticate();
                $user_id = auth()->user();

                if ($tokenFound) {
                    UserExercise::where('user_id', $user_id->id)->where('exercise_id' , $request->id)->update([
                        'Level' => $request->Level
                    ]);
                    $level = $request->Level;
                    if($level == 'beginner' || $level == 'Beginner' ){
                    All_Exercises::where('exercise_id' , '>' , 0)->update([
                        'exercise_number' => 10
                    ]);
                    }
                    else if($level == 'intermediate' || $level == 'Intermediate' ){
                    All_Exercises::where('exercise_id', '>', 0)->update([
                        'exercise_number' => 15
                    ]);
                    }
                    else if($level == 'advanced' || $level == 'Advanced' )
                    All_Exercises::where('exercise_id', '>', 0)->update([
                        'exercise_number' => 20
                    ]);

                }
                $UserExerciseInformation = UserExercise::where('user_id' , $user_id->id)->where('exercise_id' , $request->id)->get();
                return $this->returnData('User_Exercise_Information', $UserExerciseInformation ,'Add user level is successfully');
            } catch (\Exception $ex) {
                return $this->returnError($ex->getCode(), $ex->getMessage());
            }
    }

    //get focus area where the user is auth and the exercise found in database
    public function GetFocusArea(Request $request){

            try {
                $tokenFound = JWTAuth::parseToken()->authenticate();
                $user = auth()->user();
                $exercises = UserExercise::where('user_id', $user->id)->where('exercise_id' , $request->id)->get();
                if ($tokenFound && $exercises) {
                $DataExer = Exercises::where('id',$request->id)->where('type' , 'free')->get();   
                $DataAllBody = Exercises::where('id' , $request->id)->where('exercise_area' , 'All body')->where('type' , 'free')->get();                    
                if(!$DataAllBody->isEmpty()){
                    $DataAllBody = Exercises::where('type' , 'free')->get();
                    return $this->returnData('UserExerInfo', $DataAllBody ,'get the data of Focus Area of user is successfully');
                } 
                else
                    return $this->returnError(404 , 'The Focus areas with free type are not found');
                }
            } catch (\Exception $ex) {
                return $this->returnError($ex->getCode(), $ex->getMessage());
            }
    }


    public function GetAllExercises(Request $request){

            try {
                $tokenFound = JWTAuth::parseToken()->authenticate();
                $user_id = auth()->user();
                $CheckUser = UserExercise::where('exercise_id',$request->id)->where('user_id' , $user_id->id)->get();
                if ($tokenFound && $CheckUser) {
                    $AllExer = All_Exercises::where('exercise_id', $request->id)->get();   
                    $ExerAllBody = Exercises::where('id', $request->id)->where('exercise_area', 'All body')->where('type' , 'free')->get();
                   if(!$ExerAllBody->isEmpty()){
                    $AllExer = All_Exercises::where('exercise_id', '!=', 1)
                        ->where('exercise_id', '!=', 7)
                        ->where('exercise_id', '!=', 8)
                        ->get();
                        return $this->returnData('All_Exercises', $AllExer ,'get all exercises of focus area is successfully');
                    }
                 else {
                        return $this->returnError(404 , 'The Exercises are not found in database');                        
                    }
                }
            }
             catch (\Exception $ex) {
                return $this->returnError($ex->getCode(), $ex->getMessage());
            }
    }

    public function Food()
    {
        try {

            $tokenFound = JWTAuth::parseToken()->authenticate();
            $user_id = auth()->user();
            $users = User::where('id', $user_id->id)->value('maingoal_id');
            if ($tokenFound && $users == 1) {
                $food = MainGoals::find(1)->MainGoalsFood;

            } elseif ($tokenFound && $users == 2) {
                $food = MainGoals::find(2)->MainGoalsFood;

            } elseif ($tokenFound && $users == 3) {
                $food = MainGoals::find(3)->MainGoalsFood;

            }
            else {
                $food = MainGoals::find(1)->MainGoalsFood;
            }
            return $this->returnData('Foods', $food ,'get Foods is successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function Paid(Request $request)
    {
        try {
        $credentials = $request->only(['email', 'password', 'pocket_number']);
        $token = auth()->attempt($credentials);
        if (!$token) {
            return $this->returnError(401, 'Unauthorized');
        }

        $user = auth()->user();
        if ($user->pocket_value >= 100) {
           User::where('id' , $user->id)->update([
            'pocket_value' => $user->pocket_value-100
           ]);
            $exercise = Exercises::where('type', 'paid')->get();

            return $this->returnData('Exercises_Paid', $exercise, 'User login is successfully');
        }
        else {
            $exercise = [];
            return $this->returnError('Exercises_Paid', $exercise, 'The packet value is under 100');
        }
        }
        catch(\Exception $ex) {
            return $this->returnError($ex->getCode() , $ex->getMessage());
        }

    }

    public function getWeightLoss()
    {
        $tokenFound = JWTAuth::parseToken()->authenticate();
        if ($tokenFound)
        $W_exercises = Exercises::find(7)->exer_allexer;
        return $this->returnData('Weight_Loss_Exercises', $W_exercises, 'get the data of Weight Loss of user is successfully');

    }

    public function getWarmup()
    {
        $tokenFound = JWTAuth::parseToken()->authenticate();
        if($tokenFound)
        $Wa_exercises = Exercises::find(8)->exer_allexer;
        return $this->returnData('Exercises_Paid', $Wa_exercises, 'get the data of Warm up of user is successfully');

    }

    ////////////////////////////////////////////

    //Settings
    public function editSetting(Request $request)
    {
        try {
            // Authenticate the token
            $tokenFound = JWTAuth::parseToken()->authenticate();
            $user = auth()->user();

            // Retrieve the setting_id
            $settingId = UserExercise::where('user_id', $user->id)->first('setting_id');

            if ($tokenFound) {
                // Update the settings
                Settings::where('id', $settingId->setting_id)->update([
                    'Rest_Time' => $request->rest,
                    'CountDown_Time' => $request->count
                ]);

                $sett = Settings::where('id' , $settingId->setting_id)->get();
                return $this->returnData('setting', $sett , 'Changing of settings was successful');
            } else {
                if (!$tokenFound) {
                    return $this->returnError('401', 'Token authentication failed');
                }

                if (!$settingId) {
                    return $this->returnError('404', 'Setting ID not found for this user');
                }
   
            }
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    ////////////////////////////////////////////

    //Report
    public function editReport(Request $request)
    {
        try {
            $tokenFound = JWTAuth::parseToken()->authenticate();
            $user = auth()->user();

            if ($tokenFound) {
                // Retrieve the first report for the user
                $report = Reports::where('user_id', $user->id)->first();

                // Check if a report exists
                if (!$report) {
                    return $this->returnError('404', 'No report found for this user.');
                }

                // Update the report with new values
                $report->KeloKalory += $request->kelokalory;
                $report->time += $request->time;
                $report->new_weight = $user->weight; // This may need to be updated later based on conditions
                $report->last_day += 1;
                $report->exercises_counter += 1;
                $userHeightMater = $user->height / 100;
                $report->BMI = $user->weight / (($userHeightMater * $userHeightMater)); // Corrected BMI calculation

                // Check if KeloKalory exceeds 5000
                if ($report->KeloKalory >= 5000) {
                    $report->new_weight = $user->weight - 1;
                }

                // Save the updated report
                $report->save();

                // Return the updated report data
                return $this->returnData('Report_Data', $report, 'Updated the data of report of authenticated user successfully');
            } else {
                return $this->returnError('401', 'The token is not passed');
            }
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }


    public function defaultReport(){
        try {
            $tokenFound = JWTAuth::parseToken()->authenticate();
            $user = auth()->user();
            $foundReport = Reports::where('user_id' , $user->id)->exists();

            if($tokenFound && $foundReport){
                $foundReport = Reports::where('user_id' , $user->id)->get();
                return $this->returnData('report' , $foundReport , 'Return The data of report is successfully');
            }
            else if($tokenFound && $foundReport == []){
                $report = Reports::create([
                    'user_id' => $user->id,
                    'new_weight' => $user->weight
                ]); 
                $report1 = Reports::where('user_id' , $user->id)->get();
                return $this->returnData('report_Empty' , $report1 , 'Return The empty data is successfully');
            }
            else {
                return $this->returnError(401 , 'The token is not passed ');
            }
        }
         catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

}
   