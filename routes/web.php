<?php

use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ParentCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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


// Routes accessible by Admins
// Admin Auth service
Route::group(['prefix' => 'admin', 'namespace' => 'Admin/Auth'], function () {
    Route::post('/login', [AdminAuthController::class, 'login']);
});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin/Auth', 'middleware' => ['auth:admins_session_guard']], function () { // wasn't able to figure out why auth:admins did not work while admins_session_guard works fine
    Route::post('/logout', [AdminAuthController::class, 'logout']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admins_session_guard']], function () {

    Route::resource('parentcategories', ParentCategoryController::class)->except([
        'create', 'edit'
    ]);

    Route::resource('categories', CategoryController::class)->except([
        'create', 'edit'
    ]);
});








// Client (user) Auth Routes

$limiter = config('fortify.limiters.login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(array_filter([
        'guest:'.config('fortify.guard'),
        $limiter ? 'throttle:'.$limiter : null,
    ]));

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware(['guest:'.config('fortify.guard')]);

Route::group(['namespace' => 'Client', 'middleware' => ['auth:users']], function () {

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

});










// Routes available for authenticated Clients
Route::group(['namespace' => 'Client', 'middleware' => ['auth:users']], function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});



// Routes accessible by all users
Route::group(['prefix' => '/', 'namespace' => 'Client'],  function () {

    Route::get('/', function () {
        return view('app');
//        return response()->json("all good");
    });
    Route::get('{any}', function () {
        return view('app');
//        return response()->json("all good");
    })->where('any', '.*');

});
