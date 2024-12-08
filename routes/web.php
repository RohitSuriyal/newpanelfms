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




  Route::get('/view_blog', [Authcontroller::class, "view_blog"])->name("view_blog");
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

  Route::get('/addschool', function () {
    return view('addschool');
  })->name('addschool');
  Route::post("/basicdetail", [Authcontroller::class, "basicdetail"])->name("basicdetail");
  Route::post('/overviewdetails', [AuthController::class, 'overviewdetails'])->name('overviewdetails');
  Route::post("/addclassfee", [Authcontroller::class, "addclassfee"])->name("addclassfee");
  Route::post("/addeligibity", [Authcontroller::class, "addeligibity"])->name('addeligibity');
  Route::post("/addfacilities", [Authcontroller::class, "addfacilities"])->name('addfacilities');
  Route::post("/addimages", [Authcontroller::class, "addimages"])->name("addimages");


  Route::get("/finalsubmitdata", function (Request $request) {

    
    
     
      
      session()->forget('basic_detail');
      session()->forget('infrastructure');
      session()->forget('classroom');
      session()->forget('library');
      session()->forget('playground');
      session()->forget('overviewdata');
      session()->forget('facilities');
      session()->forget('Prenursery');
      session()->forget('Nursery');
      session()->forget('I');
      session()->forget('II');
      session()->forget('III');
      session()->forget('IV');
      session()->forget('V');
      session()->forget('VI');
      session()->forget('VII');
      session()->forget('VIII');
      session()->forget('IX');
      session()->forget('X');
      session()->forget('XI');
      session()->forget('XII');
      session()->forget('Prenursery_eligibility');
      session()->forget('Nursery_eligibility');
      session()->forget('LKG_eligibility');
      session()->forget('UKG_eligibility');
      session()->forget('I_eligibility');
      session()->forget('II_eligibility');
      session()->forget('III_eligibility');
      session()->forget('IV_eligibility');
      session()->forget('V_eligibility');
      session()->forget('VI_eligibility');
      session()->forget('VII_eligibility');
      session()->forget('VIII_eligibility');
      session()->forget('IX_eligibility');
      session()->forget('X_eligibility');
      session()->forget('XI_eligibility');
      session()->forget('XII_eligibility');

      return redirect()->route("addschool");
    
  })->name('finalsubmitdata');
});
Route::get("/finalsubmit", [Authcontroller::class, "finalsubmit"])->name('finalsubmit');;
