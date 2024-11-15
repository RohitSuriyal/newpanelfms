<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('login');
})->name("loginview");
Route::get("/practice",function(){
 $user=DB::table("user")->pluck("password");
  dd($user);
 
})->name("practice");



Route::post("/login", [AuthController::class, 'login'])->name("login");
Route::view("/home", "home")->name("home");
Route::middleware('authentication')->group(function () {

  Route::post("/formdata",[Authcontroller::class,"formdata"])->name("formdata");

    Route::post("/table", [Authcontroller::class, "table"]);

    Route::view("/home", "home")->name("home");
    $schooname = DB::table("schools")->select("name")->get();


    // Route::view("/addblog","addblog")->name("addblog");
    Route::get('/addblog', function () {
        // Retrieve the school names
        $schoolname = DB::table('schools')->select('name')->get();

        // Pass the data directly to the view
        return view('addblog', compact('schoolname'));
    })->name('addblog');


    Route::post("/getdata",[Authcontroller::class,"getdata"]);
});



