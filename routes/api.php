<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerificationCodeController;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => ['json']], function () {
    Route::get('/', function () {
        return Response::successResponse('Welcome to FOSI');
    });

    //view profile
    Route::get('/profile/{username}', [AuthController::class, 'viewProfile']);

    //register
    Route::post('/register', [AuthController::class, 'register']);
    //login
    Route::post('/login', [AuthController::class, 'login']);
    //resend verification code
    Route::post('/resend-verify-code', [VerificationCodeController::class, 'resendVerificationCode']);
    //verify email
    Route::post('/verify-email', [VerificationCodeController::class, 'verifyEmail']);
    //request reset password code
    Route::post('/request-reset-password', [VerificationCodeController::class, 'requestPasswordResetCode']);
    //reset password
    Route::post('/reset-password', [VerificationCodeController::class, 'resetPassword']);


    //protected routes
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::prefix('account')->group(function () {
            //create
            Route::get('/profile', [AuthController::class, 'profile']);
        });
    });
});
