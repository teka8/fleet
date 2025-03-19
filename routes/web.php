<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FuelTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MakeController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VModelController;
use App\Models\FuelType;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\RegisterController;

/** for side bar menu active */
function set_active($route) {
    if (is_array($route )){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/', function () {
    return view('landing.page');
})->name('landing_page');
use App\Http\Controllers\RoleController;

Route::post('/permission/add', [RoleController::class, 'addPermission']);
Route::post('/role/add', [RoleController::class, 'addRoleWithPermissions']);
Route::post('/user/assign-role', [RoleController::class, 'assignRoleToUser']);

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('dashboard.home');
    });
    // Route::get('home',function()
    // {
    //     return view('dashboard.home');
    // });

    // Route::get('/users', [UserController::class, 'index'])->name('users.list');
    
    Route::post('/adduser', [UserController::class, 'adduser'])->name('adduser');
    

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);


    
    
    

});

Auth::routes();

Route::group(['namespace' => 'App\Http\Controllers\Auth'],function()
{
    // -----------------------------login----------------------------------------//
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('logout/page', 'logoutPage')->name('logout/page');
    });

    // ------------------------------ register ----------------------------------//
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register','storeUser')->name('register');    
    });

    // ----------------------------- forget password ----------------------------//
    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::get('forget-password', 'getEmail')->name('forget-password');
        Route::post('forget-password', 'postEmail')->name('forget-password');    
    });

    // ----------------------------- reset password -----------------------------//
    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('reset-password/{token}', 'getPassword');
        Route::post('reset-password', 'updatePassword');    
    });
});

Route::group(['namespace' => 'App\Http\Controllers'],function()
{
    // -------------------------- main dashboard ----------------------//
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->middleware('auth')->name('home');
    });

    Route::controller(DriverController::class)->group(function () {
        Route::get('/customers', 'index')->middleware('auth')->name('customers.index');
        Route::get('/customers-onboard', 'create')->middleware('auth')->name('customers.create');
        Route::post('/customers-store', 'store')->middleware('auth')->name('customers.store');
        Route::put('/customers-update-{id}', 'update')->middleware('auth')->name('customers.update');
        Route::get('/customers-edit-{id}', 'edit')->middleware('auth')->name('customers.edit');
        Route::get('/customers-{id}', 'show')->middleware('auth')->name('customers.show');
    });

    Route::controller(VehicleController::class)->group(function () {
        Route::get('/vehicles', 'index')->middleware('auth')->name('vehicles.index');
        Route::get('/vehicles-add', 'create')->middleware('auth')->name('vehicles.create');
        Route::post('/vehicles-store', 'store')->middleware('auth')->name('vehicles.store');
        Route::post('/vehicles-update-{id}', 'update')->middleware('auth')->name('vehicles.update');
        Route::get('/vehicles-edit-{id}', 'edit')->middleware('auth')->name('vehicles.edit');
        Route::get('/vehicles-{id}', 'show')->middleware('auth')->name('vehicles.show');

    });

    Route::resource('/makes',MakeController::class)->middleware('auth');
    Route::resource('/models',VModelController::class)->middleware('auth');
    Route::resource('/fuel-types',FuelTypeController::class)->middleware('auth');

    Route::get('/vehicle-tracking', function(){return view('pages.vehicle-tracking.tracking');})->middleware('auth')->name('tracking.rtt');


});



// customer mgt


