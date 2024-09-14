<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        return view('webfiles.register');
    }
    
    public function error()
    {
        return view('webfiles.error');
    }

    public function login_view()
    {
        return view('webfiles.signin');
    }

    public function userInfo()
    {
        return view('webfiles.user');
    }
    
    public function home()
    {
        return view('webfiles.home');
    }
    
    public function paid()
    {
        return view('webfiles.paid');
    }
    
    public function paidlogin()
    {
        return view('webfiles.paidLogin');
    }
   
    public function food()
    {
        return view('webfiles.food');
    }


//      var ErrorMassage = "{{$Msg}}";
//     var ErrorCode = "{{$Code}}";
//     var Route = "{{$Route}}"


    
// <!-- <script>
//     var ErrorMassage = "{{$Msg}}";
//     var ErrorCode = "{{$Code}}";
//     var Route = "{{$Route}}"
//     alert("Error Massage " + ErrorCode + "\n\n" + ErrorMassage);
//     if (Route == '')
//         window.location.href = "{{URL('/')}}";
//     else if (Route == 'login')
//         window.location.href = "{{URL('/loginView')}}";
// </script> -->

}
