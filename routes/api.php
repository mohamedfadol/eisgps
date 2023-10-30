<?php

use App\Http\Controllers\CommandController;
use App\Http\Controllers\DevicesController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\SimcardsController;
use App\Http\Controllers\TraccarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\WasselController;
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
Route::prefix('v1')->group(function () {
    Route::post('login', [UserController::class,'login'])->name('login');
    Route::post('mobile/login/request', [UserController::class,'loginMobile'])->name('login.mobile');
    Route::post('mobile/login/confirm', [UserController::class,'loginMobileConfirm'])->name('login.mobile.confirm');
    Route::get('test', [UserController::class,'test'])->name('test');
    Route::get('test2', [UserController::class,'test2'])->name('test2');
    Route::get('session/{token}', [UserController::class,'openSession'])->name('user.session.create');
});



Route::middleware('auth:api')->prefix('v1')->group(function () {
//Route::prefix('v1')->group(function () {

    Route::get('devices', [DevicesController::class,'index'])->name('devices.index');
    Route::get('device/{id}', [DevicesController::class,'show'])->name('devices.show');
    Route::put('device/{id}', [DevicesController::class,'update'])->name('devices.update');
    Route::get('cars', [VehicleController::class,'index'])->name('cars.index');
    Route::delete('car/{id}', [VehicleController::class,'destroy'])->name('cars.delete');
    Route::get('car/{id}', [VehicleController::class,'show'])->name('cars.show');
    Route::put('car/{id}', [VehicleController::class,'update'])->name('cars.update');
    Route::get('user/{id}/devices', [DevicesController::class,'devicesByUser'])->name('devices.byUser');
    Route::get('device/{id}/driver', [DriverController::class,'driverByDevice'])->name('drivers.byDevice');
    Route::get('groups', [GroupsController::class,'index'])->name('groups.index');
    Route::get('users', [UserController::class,'index'])->name('users.index');
    Route::get('user/{id}', [UserController::class,'show'])->name('users.show');
    Route::put('user/{id}', [UserController::class,'update'])->name('users.update');
    Route::delete('user/{id}', [UserController::class,'destroy'])->name('users.delete');
    Route::put('user/{id}/action/{action}', [UserController::class,'enableDisableUser'])->name('users.action');
    Route::put('device/{id}/action/{action}', [DevicesController::class,'enableDisableDevice'])->name('devices.action');
    Route::put('user/{id}/password/reset', [UserController::class,'resetPassword'])->name('users.password.reset');
    Route::get('account/{token}', [UserController::class,'myProfile'])->name('users.profile');
    Route::get('partners', [UserController::class,'getPartnersList'])->name('partners.index');
    Route::get('customers', [UserController::class,'getCustomersList'])->name('customers.index');
    Route::get('server', [TraccarController::class,'server'])->name('server.info');
    Route::get('commands', [CommandController::class,'index'])->name('commands.index');
    Route::get('command/{id}', [CommandController::class,'show'])->name('commands.show');
    Route::put('command/{id}', [CommandController::class,'update'])->name('commands.update');
    Route::post('command', [CommandController::class,'store'])->name('commands.store');
    Route::delete('command/{id}', [CommandController::class,'destroy'])->name('commands.delete');
    Route::get('wasl/facility/{type}', [UserController::class,'getUserHaveWassel'])->name('wassel.facilities');
    Route::get('drivers', [DriverController::class,'index'])->name('drivers.index');
    Route::get('driver/{id}', [DriverController::class,'show'])->name('drivers.show');
    Route::put('driver/{id}', [DriverController::class,'update'])->name('drivers.update');
    Route::get('events/{id}', [DevicesController::class,'getEventsById'])->name('devices.events');
    Route::get('positions', [TraccarController::class,'positions'])->name('positions.index');
    Route::get('positions/{id}', [TraccarController::class,'positionById'])->name('positions.show');

    Route::post('new/registration', [FacilityController::class,'store'])->name('facilities.store');
    Route::post('new/device', [DevicesController::class,'store'])->name('device.store');
    Route::post('user/new/registration', [FacilityController::class,'newEntry'])->name('facilities.new');
    Route::post('wasl/operating-companies', [WasselController::class,'operatingCompanies'])->name('wassel.company');
    Route::delete('wasl/operating-companies/{id}', [WasselController::class,'deleteOperatingCompanies'])->name('wassel.company.delete');
    Route::put('wasl/update/operating-companies', [WasselController::class,'updateOperatingCompanies'])->name('wassel.company');
    Route::post('wasl/check/action', [WasselController::class,'checkActionWithWasl'])->name('wassel.check.action');
    Route::get('wasl/list', [WasselController::class,'WaslList'])->name('wassel.list');
    Route::get('wasl/{id}/vehicles', [WasselController::class,'WaslVehiclesList'])->name('wassel.cars.list');
    Route::delete('wasl/{id}/vehicle', [WasselController::class,'deleteWaslVehicle'])->name('wassel.cars.delete');
    Route::delete('wasl/{id}/driver', [WasselController::class,'deleteWaslDriver'])->name('wassel.driver.delete');
    Route::get('wasl/{id}/drivers', [WasselController::class,'WaslDriversList'])->name('wassel.cars.list');
    Route::get('facilities', [FacilityController::class,'index'])->name('facilities.index');
    Route::get('facility/{id}', [FacilityController::class,'show'])->name('facilities.show');
    Route::put('facility/{id}', [FacilityController::class,'update'])->name('facilities.update');
    Route::get('simcards', [SimcardsController::class,'index'])->name('sim_cards.index');
    Route::get('simcards/all/{p}', [SimcardsController::class,'all'])->name('sim_cards.all');
    Route::get('notifications', [TraccarController::class,'getNotifications'])->name('notifications.index');
    Route::get('google/geocode/{lat}/{long}', [WasselController::class,'getGeocode'])->name('google.geocode');
});

