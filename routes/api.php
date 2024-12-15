<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\AuthenticationException;
use App\Http\Controllers\Api\V1\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login', function (Request $request) {
    // Find the user by email
    $user = User::where('name', $request->name)->first();

    // Check if the user exists and the password matches
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Create the token
    $token = $user->createToken('auth_token')->plainTextToken;


    // Return the token and expiration time
    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
        'expires_in' => 60, // Expiry time in seconds
    ]);
});


Route::middleware(['auth:sanctum'])->group(function () {

    Route::prefix('v1')->namespace('Api\V1')->group(function () {
        Route::post('/logintoapp', [UserController::class, "logintoapp"]);

        Route::post("/getschooldata", [UserController::class, "getschooldata"]);
        Route::post("/schoolpage", [UserController::class, "schoolpage"]);
        Route::post("/blogpage", [UserController::class, "blogpage"]);
        Route::post("/sendotp", [UserController::class, "sendotp"]);
        Route::post("/confirmotp",[UserController::class,"confirmotp"]);

      
    });
});
