<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthWebController;
use App\Http\Controllers\ExercisesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; // here you  enter the url of controller file with Controller name
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSingleFunction;
use App\Http\Controllers\ViewController;
use Illuminate\Contracts\View\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//lesson 5
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ViewController::class, 'index'])->name('Start_Page_Register'); 
Route::get('/loginView', [ViewController::class, 'login_view'])->name('LoginView'); 
Route::get('/UserInfo', [ViewController::class, 'userInfo'])->name('UserInf'); 

Route::post('/register',  [AuthWebController::class, 'registerWeb'])->name('register');
Route::get('/login',  [AuthWebController::class, 'loginWeb'])->name('login');
Route::post('/enterUserInfo',  [AuthController::class, 'Enter_User_Info'])->name('userInfo');
Route::get('/home' , [ViewController::class  , 'home'])->name('home');
Route::get('/paid' , [ViewController::class  , 'paid'])->name('paid');
Route::get('/paidlogin' , [ViewController::class  , 'paidlogin'])->name('paidlogin');
Route::get('/food' , [ViewController::class  , 'food'])->name('food');
Route::get('/error' , [ViewController::class  , 'error'])->name('error');
// Route::get('mypage', function(){
//     return "ahmad";
// });

//lesson 6
// Route::post('/Home',function(Request $request){
//     return $request;
// });

// lesson 7
// Route::get('mypage/{name}', function($name){
//     if($name == 'ahmad')
//     return "Admin";
//     else 
//     return "user";
// });
// Route::get('mystart/{idnumber}', function(int $id){
//     if($id == 1)
//     return "Admin";
//     else 
//     return "user";
// });

// lesson8
// Route::get('/users',function(){
//     $username = "ahmad nouh";
//     return view('lesson8' , compact('username')); //this line return the username varable and  in lesson8 you write the {{$usename}} and it will print ahmad nouh 
// });

//lesson9 Routs
// Route::get("/",function(){
//    return view('Home');
// });

// Route::get("/users",function(){
//    return view('users');
// });

// Route::get("/posts",function(){
//    return view('posts');
// });

//Lesson10 and lesson11 Controller
//the first way
//Route::get('/posts',[App\Http\Controllers\PostController::class,'showPost']);
//the second way
//Route::get('/posts',[PostController::class,'showPost']);
// I can get to function with tow way 
// the first
// Route::get('/posts',[PostController::class,'showPost']);
// Route::get('/posts/create',[PostController::class,'createPost']);
// Route::get('/posts/edit/{id}',[PostController::class,'editPost']);
// Route::get('/posts/update/{id}',[PostController::class,'updatePost']);
// Route::get('/posts/delete/{id}',[PostController::class,'deletePost']);
// the second
//                controller name
// Route::controller(PostController::class)->group(function(){
//     Route::get('/posts','showPost');
//     Route::get('/posts/create','createPost');
//     Route::get('/posts/edit/{id}','editPost');
//     Route::get('/posts/update/{id}','updatePost');
//     Route::get('/posts/delete/{id}','deletePost');
// });

// #lesson 12 Make controller with resource
// in cmd you write php artisan make:controller myController --resource or (-r)
// this for we don't write the Route function in the code 77 to 81 lines 
//Route::resource("/user",UserController::class);

// #lesson13 expect or only there are function the first delete functions from controller 
// and the second go on only function that is selected
//Route::resource('users',App\Http\controllers\UserController::class)->except(['update','show']);
//Route::resource('users',App\Http\controllers\UserController::class)->only(['create','show']);

// #lesson14 this lesson talk about the single controller this is do only one function
// to create this controller you  write in cmd php artisan make:controller Controller_name --invokable or (-i)  
//Route::get('/usersingle',[UserSingleFunction::class,'__invoke']);
//Route::get('/usersingle',UserSingleFunction::class);

// #lesson15 this lesson talk about the construct => in laravel the construct is function using for some function
// example on this function you want to create page no anybody enter on it
//Route::resource("/user",UserController::class); // The output is error content Route [login] not define

// #lesson16
// #lesson17
//php artisan migrate // for add tables in migration to database 
//php artisan migrate:status // for you know what is table that added to database and the tables that is not 
                            //added to database and found in migration

//#lesson 18 create first table
// note1: php artisan make:migration create_(name of column with s)_table // for you know what is table that add to database
// note2: if you write some instuction and write "list" will show instructions  for complate the instruction that you write it
// note3: when I wrie the commmand in note1 if I create table with group(جمع) , laravel will
// help to you and add to you position for write names of column and content it 
// note4: if you want add a column you write in create migration (table->Datatype(column name , length)->defulte(value) ) 

//#lesson 19 migration command rollback - fresh - refresh - reset
// note1 : php artisan migrate:rollback =>this is delete the table that I add it in end any last table
// note2 : php artisan migrate:rollback --step=$number =>this is delete the last steps  
// note3 : php artisan migrate:reset => this is work rollback of all tables in database
// note4 : php artisan migrate:refresh =>this is work rollback of all tables in database then work migrate of them 
// note5 : php artisan migrate:fresh => this is work dropping of all tables in database then work migrate of them

//#lesson 10 Migration command add column to table
// note1 : php artisan make:migration add_columnname_to_tablename => this command will add migration when I write migrate command will add the column of a database table
// note2 : In The migration that is will create found "Up function" and "Down function"
// note3 : up function => this is create of column of database tables
// note4 : down function => this is delete of column of database tables and I write rollback command If I wrote "$table->dropColumn(column name)"