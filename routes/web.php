<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/how-it-work', [App\Http\Controllers\HomeController::class, 'howItWork'])->name('howItWork');
Route::get('/plans', [App\Http\Controllers\HomeController::class, 'plans'])->name('plans');
Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');


Route::get('/email', function () {
    return view('emails.withdrawEmail');
});

Auth::routes();


Route::group(['middleware' => ['auth', 'role:user']], function() {
    Route::get('/user/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/user/deposit', [App\Http\Controllers\UserController::class, 'deposit'])->name('deposit');
    Route::get('/user/deposit/{id}', [App\Http\Controllers\UserController::class, 'depositMethod'])->name('depositMethod');
    Route::get('/user/deposit/currency/{id}', [App\Http\Controllers\UserController::class, 'fetchCurrency'])->name('fetchCurrency');
    Route::post('/user/deposit/create', [App\Http\Controllers\UserController::class, 'createDeposit'])->name('createDeposit');
    Route::get('/user/withdraw', [App\Http\Controllers\UserController::class, 'withdraw'])->name('withdraw');
    Route::post('/user/withdraw/request', [App\Http\Controllers\UserController::class, 'withdrawalRequest'])->name('withdrawalRequest');
    Route::get('/user/transactions', [App\Http\Controllers\UserController::class, 'transactions'])->name('transactionHistory');
    Route::get('/user/settings/referrals', [App\Http\Controllers\UserController::class, 'referrals'])->name('userReferrals');
    Route::get('/user/settings/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('userProfile');
    Route::post('/user/settings/profile/update', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('updateUserProfile');
    Route::get('/user/settings/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('changePassword');
    Route::post('/user/settings/password/update', [App\Http\Controllers\UserController::class, 'changePasswordUpdate'])->name('changePasswordUpdate');
    Route::get('/user/email/verify/{token}', [App\Http\Controllers\UserController::class, 'processVerifyEmail'])->name('processVerifyEmail');
    Route::get('/user/email/resend/{id}', [App\Http\Controllers\UserController::class, 'resendEmail'])->name('resendEmail');
});




Route::group(['middleware' => ['auth', 'role:superadmin']], function() {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
    Route::get('/admin/users/edit/{id}', [App\Http\Controllers\AdminController::class, 'editUser'])->name('editUsers');
    Route::put('/admin/users/update/{id}', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('updateUser');
    Route::get('/admin/users/details/{id}', [App\Http\Controllers\AdminController::class, 'userDetails'])->name('userDetails');
    Route::get('/admin/users/deposits/{id}', [App\Http\Controllers\AdminController::class, 'activeDeposits'])->name('activeDeposits');
    Route::put('/admin/users/deposits/{id}', [App\Http\Controllers\AdminController::class, 'processDeposit'])->name('processDeposit');
    Route::get('/admin/transactions', [App\Http\Controllers\AdminController::class, 'transactions'])->name('transactions');
    Route::get('/admin/transactions/user/{id}', [App\Http\Controllers\AdminController::class, 'addTransaction'])->name('addTransaction');
    Route::post('/admin/transactions/user/{id}', [App\Http\Controllers\AdminController::class, 'createAddTransaction'])->name('createAddTransaction');
    Route::get('/admin/withdrawal_requests', [App\Http\Controllers\AdminController::class, 'withdrawalRequests'])->name('withdrawalRequests');
    Route::get('/admin/withdraw_pay/{id}', [App\Http\Controllers\AdminController::class, 'withdrawPay'])->name('withdrawPay');
    Route::post('/admin/withdraw_pay/{id}', [App\Http\Controllers\AdminController::class, 'processWithdrawalPay'])->name('processWithdrawalPay');
    
    Route::get('/admin/currencies', [App\Http\Controllers\AdminController::class, 'currencies'])->name('currencies');
    Route::post('/admin/currencies/store', [App\Http\Controllers\AdminController::class, 'storeCurrency'])->name('storeCurrency');
    Route::get('/admin/currencies/edit/{id}', [App\Http\Controllers\AdminController::class, 'editCurrency'])->name('editCurrency');
    Route::put('/admin/currencies/update/{id}', [App\Http\Controllers\AdminController::class, 'updateCurrency'])->name('updateCurrency');
    Route::delete('/admin/currencies/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteCurrency'])->name('deleteCurrency');
    Route::get('/admin/plans', [App\Http\Controllers\AdminController::class, 'plans'])->name('adminPlans');
    Route::post('/admin/plans/store', [App\Http\Controllers\AdminController::class, 'storePlan'])->name('storePlan');
    Route::get('/admin/plans/edit/{id}', [App\Http\Controllers\AdminController::class, 'editPlan'])->name('editPlan');
    Route::put('/admin/plans/update/{id}', [App\Http\Controllers\AdminController::class, 'updatePlan'])->name('updatePlan');
    Route::delete('/admin/plans/delete/{id}', [App\Http\Controllers\AdminController::class, 'deletePlan'])->name('deletePlan');
    Route::get('/admin/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('adminProfile');
    Route::post('/admin/profile/update', [App\Http\Controllers\AdminController::class, 'updateProfile'])->name('adminUpdateProfile');
    Route::put('/user/settings/referral/update', [App\Http\Controllers\AdminController::class, 'updateReferralSettings'])->name('updateReferralSettings');
    Route::get('/admin/company', [App\Http\Controllers\AdminController::class, 'company'])->name('adminCompany');
    Route::post('/admin/company/update', [App\Http\Controllers\AdminController::class, 'updateCompany'])->name('adminUpdateCompany');
    Route::get('/admin/statistics', [App\Http\Controllers\AdminController::class, 'statistics'])->name('statistics');
    Route::put('/admin/statistics/update', [App\Http\Controllers\AdminController::class, 'updateStatistics'])->name('updateStatistics');
});

