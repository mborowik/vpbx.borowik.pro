<?php

use App\Models\Sip;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Process;
use App\Http\Controllers\Cdrcontroller;
use App\Http\Controllers\SipController;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\Dashboardconrtoller;
use App\Http\Controllers\Systeminfocontroller;
use App\Http\Controllers\Activecallscontroller;
use App\Http\Controllers\IncomingRoutingController;
use App\Http\Controllers\OutgoingRoutingController;
use Symfony\Component\Process\Exception\ProcessFailedException;

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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [Dashboardconrtoller::class, 'index'])->name('dashboard');
    Route::get('/', [Dashboardconrtoller::class, 'index'])->name('home');

    Route::get('/provider/test', [ProviderController::class, 'updateextenconfig'])->name('provider.updateextenconfig');
    Route::get('/provider/add', [ProviderController::class, 'create'])->name('provider.add');
    Route::post('/provider', [ProviderController::class, 'store'])->name('provider.store');
    Route::get('/provider', [ProviderController::class, 'index'])->name('provider');
    Route::get('/provider/{provider}', [ProviderController::class, 'show'])->name('provider.show');
    Route::get('/provider/{provider}/edit', [ProviderController::class, 'edit'])->name('provider.edit');
    Route::delete('/provider/{provider}', [ProviderController::class, 'destroy'])->name('provider.delete');
    Route::patch('/provider/{provider}', [ProviderController::class, 'update'])->name('provider.update');


   
    Route::get('/cdr', [Cdrcontroller::class, 'index'])->name('cdr');
    Route::get('/activecalls', [Activecallscontroller::class, 'index'])->name('activecalls');
    Route::get('/system', [Systeminfocontroller::class, 'index'])->name('system');
    Route::get('/dashboard', [Dashboardconrtoller::class, 'index'])->name('dashboard');
    
    Route::get('/incomingroutes', [IncomingRoutingController::class, 'index'])->name('incomingroutes');
    Route::get('/incomingroutes/add', [IncomingRoutingController::class, 'create'])->name('incomingroutes.add');
    Route::post('/incomingroutes', [IncomingRoutingController::class, 'store'])->name('incomingroutes.store');

    Route::get('/incomingroutes/{incomingRouting}/edit', [IncomingRoutingController::class, 'edit'])->name('incomingroutes.edit');
    Route::delete('/incomingroutes/{incomingRouting}', [IncomingRoutingController::class, 'destroy'])->name('incomingroutes.delete');
    Route::patch('/incomingroutes/{incomingRouting}', [IncomingRoutingController::class, 'update'])->name('incomingroutes.update');



    Route::get('/outgoingroutes', [OutgoingRoutingController::class, 'index'])->name('outgoingroutes');
    Route::get('/outgoingroutes/add', [OutgoingRoutingController::class, 'create'])->name('outgoingroutes.add');
    Route::post('/outgoingroutes', [OutgoingRoutingController::class, 'store'])->name('outgoingroutes.store');

    Route::get('/outgoingroutes/{outgoingRouting}', [OutgoingRoutingController::class, 'show'])->name('outgoingroutes.show');
    Route::get('/outgoingroutes/{outgoingRouting}/edit', [OutgoingRoutingController::class, 'edit'])->name('outgoingroutes.edit');
    Route::delete('/outgoingroutes/{outgoingRouting}', [OutgoingRoutingController::class, 'destroy'])->name('outgoingroutes.delete');
    Route::patch('/outgoingroutes/{outgoingRouting}', [OutgoingRoutingController::class, 'update'])->name('outgoingroutes.update');
    


    Route::delete('/number/{number}', [NumberController::class, 'destroy'])->name('number.delete');


    Route::post('/number/{provider}', [NumberController::class, 'store'])->name('number.store');
    Route::post('/numbers/{provider}', [NumberController::class, 'store_multiple'])->name('numbers.store');

    Route::get('/number/{provider}', [NumberController::class, 'create'])->name('number.add');
    Route::get('/numbers/{provider}', [NumberController::class, 'create_multiple'])->name('numbers.add');
    Route::get('/number', [NumberController::class, 'index'])->name('numbers.index');
    Route::get('/numbergen', [NumberController::class, 'gen'])->name('number.gen');

    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

    Route::get('/sip', [SipController::class, 'index'])->name('sip');
    Route::get('/sip/add', [SipController::class, 'create'])->name('sip.add');
    Route::post('/sip', [SipController::class, 'store'])->name('sip.store');



    // Route::get('sip', function () {
    //     $sip = new Sip;
    
 
    //     $sip->uniqid = '!jnsdc8734rhisd';
    //     $sip->extension = '!marcin';
    //     $sip->username = '!borowik';
    //     $sip->secret = '!czupakabras';
    //     $sip->defaultuser = '!sip.borowik.pro';
    //     $sip->fromuser = '!borowik';

 
    //     $sip->save();
    //     activity()
    //         ->on($sip)
    //         ->by($sip)
    //         ->withProperties($sip)
    //         ->event('delete')
    //         ->log('Look mum, I logged something');


    //     $lastLoggedActivity = Activity::all()->last();

    //     $lastLoggedActivity->subject; //returns an instance of an eloquent model
    //     $lastLoggedActivity->causer; //returns an instance of your user model
    //     $lastLoggedActivity->getExtraProperty('customProperty'); //returns 'customValue'
    //     $lastLoggedActivity->description; //returns 'Look mum, I logged something'
    // });
});
