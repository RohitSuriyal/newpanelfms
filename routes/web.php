<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
Route::get("/practice", function () {
  $user = DB::table("user")->pluck("password");
  dd($user);
})->name("practice");
Route::view("/home", "home")->name("home");

Route::post("/formdata", [Authcontroller::class, "formdata"])->name("formdata");
Route::post("/login", [AuthController::class, 'login'])->name("login");
Route::get('/addblog', function () {
  // Retrieve the school names
  $schoolname = DB::table('schools')->select('name', 'id')->get();

  // Pass the data directly to the view
  return view('addblog', compact('schoolname'));
})->name('addblog');

Route::middleware('authentication')->group(function () {

 

  Route::post("/table", [Authcontroller::class, "table"]);

 


  // Route::view("/addblog","addblog")->name("addblog");
 

  Route::post("/getdata", [Authcontroller::class, "getdata"]);


  Route::get("/update", [Authcontroller::class, "update_blog"])->name('update_blog');
  Route::post("/updatedata",[Authcontroller::class,"updateblogdata"])->name("updateblogdata");
  Route::get('/logout', function () {
    // Log out the user
    Auth::logout();
    
    // Invalidate the session and regenerate the CSRF token for security
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    
    // Redirect the user to a desired route after logout
    return redirect('/');
})->name("logout");

});
