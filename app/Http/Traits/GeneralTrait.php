<?php

namespace App\Http\Traits;

trait GeneralTrait {

    //there function is of return the response with same form 
    public function returnError($errNum , $msg){ //this function return to me messages of error
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }

    public function returnSuccessMessage($errNum = 200 , $msg){ //this function return to me messages of error
        return response()->json([
            'status' => true,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }

    public function returnData($key , $value , $msg){ //this function return to me messages of error
        return response()->json([
            'status' => true,
            'errNum' => 200,
            'msg' => $msg,
            $key => $value
        ]);
    }    
    
    // functions of validation 
    public function returnValidationError($code = 'E001' , $validator) {
        return $this->returnError($code , $validator->errors()->first());
    }

    public function returnCodeAccordingToInput($validator){
        $inputs = array_keys($validator->errors()->toArray());
        $code = $this->getErrorCode($inputs[0]);
        return $code;
    }

    public function getErrorCode($inputs) {
        if($input = "name")
            return 'E001';
        
        if($input = "email")
            return 'E002';

        if($input = "password")
            return 'E003';
        
        if($input = "pocket_value")
            return 'E004';

        if($input = "pocket_number")
            return 'E005';
    }
    
    // public function getCurrentLang() {  // note this function is not using in this project
    //     return app()->getLocale();
    // }
}