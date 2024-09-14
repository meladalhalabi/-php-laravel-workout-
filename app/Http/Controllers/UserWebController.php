<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use App\Models\All_Exercises;
use App\Models\Exercises;
use App\Models\MainGoals;
use App\Models\Settings;
use App\Models\User;
use App\Models\UserExercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserWebController extends Controller
{

    public function Enter_User_Info(Request $request){
        try {

            $rules = [
                'weight' => 'required|numeric|max:200',
                'height' => 'required|numeric|max:250',
                'language' => 'required|string|max:1',
                'gender' => 'required|string|max:1',
                'Level' => 'required|string|max:20',
          ];

            $validator = Validator::make($request->all(), $rules);
            
            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator); //this function in generalTrait and it will give me the code of error
                return $this->returnValidationError($code, $validator); //this return the code and message of validator
            }

            $tokenFound = JWTAuth::parseToken()->authenticate();
            $user_id = auth()->user();
            $main_goal_id = MainGoals::where('id', $request->id);
            $exercise_id = Exercises::where('id', $request->id);
            if ($tokenFound) {
                $userInfo = User::where('id', $user_id->id)->update([
                    'weight' => $request->weight,
                    'height' => $request->height,
                    'maingoal_id' => $request->maingoal,
                    'language' => $request->language
                ]);
                
                if($main_goal_id){
                    User::where('id', $user_id->id)->update([
                        'maingoal_id' => $request->id,
                    ]);
                }

                if ($tokenFound && $exercise_id && $user_id) {

                    $setting = Settings::create([
                        'Rest_Time' => 25,
                        'CountDown_Time' => 15
                    ]);

                    UserExercise::create([
                        'exercise_id' => $exercise_id->id,
                        'user_id' => $user_id->id,
                        'setting_id' => $setting->id
                    ]);
                }

                UserExercise::where('user_id', $user_id->id)->where('exercise_id', $request->id)->update([
                    'Level' => $request->level
                ]);
                $level = $request->level;
                if ($level == 'beginner' || $level == 'Beginner') {
                    All_Exercises::where('exercise_id', '>', 0)->update([
                        'exercise_number' => 10
                    ]);
                } else if ($level == 'intermediate' || $level == 'Intermediate') {
                    All_Exercises::where('exercise_id', '>', 0)->update([
                        'exercise_number' => 15
                    ]);
                } else if ($level == 'advanced' || $level == 'Advanced')
                    All_Exercises::where('exercise_id', '>', 0)->update([
                        'exercise_number' => 20
                    ]);
            }
            return $this->returnSuccessMessage(200, 'Add user weight and height is successfully');
            // return view('webfiles.home');
        } catch (\Exception $ex) {
            // return $this->returnError($ex->getCode(), $ex->getMessage());
            return view('webfiles.error' , ['Msg' => $ex->getMessage() , 'Code' => $ex->getCode() , 'Route' => 'register']);
        }         
    } 

    ///// enter weight and height of user
    public function Enter_Weight_height(Request $request, $id)
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

            $tokenFound = JWTAuth::parseToken()->authenticate();

            if ($tokenFound) {
                $weight_height = User::where('id', $id)->update([
                    'weight' => $request->weight,
                    'height' => $request->height,

                ]);
            }
            return $this->returnSuccessMessage(200, 'Add user weight and height is successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    ///// enter the main goal of user
    public function EnterMainGoal(Request $request, $id)
    {

        try {

            $tokenFound = JWTAuth::parseToken()->authenticate();
            $main_goal_id = MainGoals::where('id', $request->id);

            if ($tokenFound && $main_goal_id) {
                $maingoal_id = User::where('id', $id)->update([
                    'maingoal_id' => $request->id,
                ]);
            }
            return $this->returnSuccessMessage(200, 'Add the main goal is successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    ///// enter the focus area of the user and add setting with default values
    public function EnterFocusArea(Request $request, $id)
    {

        try {

            $tokenFound = JWTAuth::parseToken()->authenticate();
            $exercise_id = Exercises::where('id', $request->id);

            $user_id = User::where('id', $id);
            if ($tokenFound && $exercise_id && $user_id) {

                $setting = Settings::create([
                    'Rest_Time' => 25,
                    'CountDown_Time' => 15
                ]);

                UserExercise::create([
                    'exercise_id' => $request->id,
                    'user_id' => $id,
                    'setting_id' => $setting->id
                ]);
            }
            return $this->returnSuccessMessage(200, 'Add Focus Area is successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    ///// determine the gender of user
    public function EnterGender(Request $request, $id)
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

            if ($tokenFound) {
                $gender = User::where('id', $id)->update([
                    'gender' => $request->gender
                ]);
            }
            return $this->returnSuccessMessage(200, 'Add user gender is successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    ///// add the language of app
    public function EnterLanguage(Request $request, $id)
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

            $tokenFound = JWTAuth::parseToken()->authenticate();

            if ($tokenFound) {
                $language = User::where('id', $id)->update([
                    'language' => $request->language
                ]);
            }
            return $this->returnSuccessMessage(200, 'Add user language is successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    // enter the level of user where the front will give me the user_id , exercise_id and the level
    public function EnterLevel(Request $request, $id)
    {

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

            if ($tokenFound) {
                UserExercise::where('user_id', $id)->where('exercise_id', $request->id)->update([
                    'Level' => $request->Level
                ]);
                $level = $request->Level;
                if ($level == 'beginner' || $level == 'Beginner') {
                    All_Exercises::where('exercise_id', '>', 0)->update([
                        'exercise_number' => 10
                    ]);
                } else if ($level == 'intermediate' || $level == 'Intermediate') {
                    All_Exercises::where('exercise_id', '>', 0)->update([
                        'exercise_number' => 15
                    ]);
                } else if ($level == 'advanced' || $level == 'Advanced')
                    All_Exercises::where('exercise_id', '>', 0)->update([
                        'exercise_number' => 20
                    ]);
            }
            $UserExerciseInformation = UserExercise::where('user_id', $id)->where('exercise_id', $request->id)->get();
            return $this->returnData('User_Exercise_Information', $UserExerciseInformation, 'Add user level is successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

}
