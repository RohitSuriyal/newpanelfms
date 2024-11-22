<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

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


Route::post("/login", [AuthController::class, 'login'])->name("login");

Route::middleware(['authentication'])->group(function () {

  Route::get('/home', function () {

   
    $blogcount = DB::table("blog")->count();
    $schoolcount = DB::table("schools")->count();
  
  
    // Return the view
    return view('home', compact('blogcount', 'schoolcount'));
  })->name('home');
  
  Route::post("/formdata", [Authcontroller::class, "formdata"])->name("formdata");
  Route::get('/addblog', function () {
    // Retrieve the school names
    $schoolname = DB::table('schools')->select('name', 'id')->get();
  
    // Pass the data directly to the view
    return view('addblog', compact('schoolname'));
  })->name('addblog');
  
  
  
  
  
  
  Route::post("/table", [Authcontroller::class, "table"]);
  
  
  
  
  // Route::view("/addblog","addblog")->name("addblog");
  
  
  
  Route::post("/getdata", [Authcontroller::class, "getdata"]);
  
  
  
  
  Route::get('/view_blog',[Authcontroller::class,"view_blog"])->name("view_blog");
  Route::get("/update", function (Request $request) {
  
  
    $data = DB::table("blog")->where("id", $request->id)->get();
    $schoolname = DB::table('schools')->select('name', 'id')->get();
    $id = $request->id;
    return view("update", compact('data', 'schoolname', 'id'));
  })->name('update_blog');
  Route::get("/deleteblog", [Authcontroller::class, "deleteblog"])->name("deleteblog");
  
  
  Route::post("/updatedata", [Authcontroller::class, "updateblogdata"])->name("updateblogdata");
  Route::get('/logout', function () {
    // Log out the user
    Auth::logout();
  
    // Invalidate the session and regenerate the CSRF token for security
    request()->session()->invalidate();
    request()->session()->regenerateToken();
  
    // Redirect the user to a desired route after logout
    return redirect('/');
  })->name("logout");
  
  Route::view('/addschool', 'addschool')->name('addschool');




});


