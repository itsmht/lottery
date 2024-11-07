<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

//Route::get('/', function () {return view('welcome');});
Route::get('/cronsStart', function () {
    \Artisan::call('balance:add');
    return true;
});
Route::get('/reverseSub', function () {
    \Artisan::call('balance:add');
    return true;
});

//Unprotected Routes
Route::get('/', [CommonController::class, 'home'])->name('home');
Route::get('about', [CommonController::class, 'about'])->name('about');
Route::get('play', [CommonController::class, 'play'])->name('play');
Route::get('/contact', [CommonController::class, 'contact'])->name('contact');
Route::get('/packages', [CommonController::class, 'packages'])->name('packages');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login.submit', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerSubmit', [AuthController::class, 'registerSubmit'])->name('registerSubmit');
Route::get('forgotPassword', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('forgotPasswordSubmit', [AuthController::class, 'forgotPasswordSubmit'])->name('forgotPasswordSubmit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin Routes
Route::group(['middleware' => ['prevent.back', 'auth.guest', 'logged.user','type']], function () {
    Route::get('/adminDashboard', [AdminController::class, 'dashboard'])->name('adminDashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('details', [AdminController::class, 'details'])->name('details');
    Route::post('/search.submit', [AdminController::class, 'searchSubmit'])->name('search.submit');
    Route::get('searchCompany', [AdminController::class, 'searchCompany'])->name('searchCompany');
    Route::post('changeStatus', [AdminController::class, 'changeStatus'])->name('changeStatus');
    Route::get('rechargeList', [AdminController::class, 'rechargeList'])->name('rechargeList');
    Route::post('approveRecharge', [AdminController::class, 'approveRecharge'])->name('approveRecharge');
    Route::get('withdrawList', [AdminController::class, 'withdrawList'])->name('withdrawList');
    Route::post('approveWithdraw', [AdminController::class, 'approveWithdraw'])->name('approveWithdraw');
    Route::get('transactionList', [AdminController::class, 'transactionList'])->name('transactionList');
    Route::post('adminReferSubmit', [UserController::class, 'userReferSubmit'])->name('adminReferSubmit');
    Route::post('userRecharge', [AdminController::class, 'userRecharge'])->name('userRecharge');
    Route::post('editUser', [AdminController::class, 'editUser'])->name('editUser');
    Route::post('cancelTransaction',[AdminController::class, 'cancelTransaction'])->name('cancelTransaction');
    Route::get('schemeList', [AdminController::class, 'schemeList'])->name('schemeList');
    Route::post('createScheme',[AdminController::class, 'createScheme'])->name('createScheme');
    Route::post('createUser',[AdminController::class, 'createUser'])->name('createUser');
    Route::get('purchaseList', [AdminController::class, 'purchaseList'])->name('purchaseList');
    Route::post('createPurchase',[AdminController::class, 'createPurchase'])->name('createPurchase');
    Route::post('updatePurchase',[AdminController::class, 'updatePurchase'])->name('updatePurchase');
    Route::get('announcementList', [AdminController::class, 'announcementList'])->name('announcementList');
    Route::post('createAnnouncement',[AdminController::class, 'createAnnouncement'])->name('createAnnouncement');
    Route::post('updateAnnouncement',[AdminController::class, 'updateAnnouncement'])->name('updateAnnouncement');

});

//User Routes
Route::group(['middleware' => ['prevent.back', 'auth.guest', 'logged.user']], function () {
    Route::get('/userDashboard', [UserController::class, 'dashboard'])->name('userDashboard');
    Route::get('withdrawRequest', [UserController::class, 'withdrawRequest'])->name('withdrawRequest');
    Route::post('withdrawSubmit', [UserController::class, 'withdrawSubmit'])->name('withdrawSubmit');
    Route::get('userProfile', [UserController::class, 'userProfile'])->name('userProfile');
    Route::post('editUserProfile',[UserController::class, 'editUserProfile'])->name('editUserProfile');
    Route::get('recharge', [UserController::class, 'recharge'])->name('recharge');
    Route::post('rechargeSubmit', [UserController::class, 'rechargeSubmit'])->name('rechargeSubmit');
    Route::post('invest', [UserController::class, 'invest'])->name('invest');
    Route::get('userTransactions', [UserController::class, 'userTransactions'])->name('userTransactions');
    Route::get('userRefer', [UserController::class, 'userRefer'])->name('userRefer');
    Route::post('userReferSubmit', [UserController::class, 'userReferSubmit'])->name('userReferSubmit');
    Route::get('inside/{id}', [UserController::class, 'inside'])->name('inside');
});
