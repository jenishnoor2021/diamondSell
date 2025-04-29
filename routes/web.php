<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPartyController;
use App\Http\Controllers\AdminPlaneController;
use App\Http\Controllers\AdminDiamondController;

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
    return view('auth.login');
})->name('admin.login');

//  for admin registration below comment uncomment karvi and above auth.login ne comment karvi
// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();

Route::get('/qrcode/{slug}', [App\Http\Controllers\AdminQrcodesController::class, 'redirectUrl'])->name('redirectUrl');
// Route::get('/{time}', function () {
//     return redirect('https://sevencountriesvisa.com/');
// });

// Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/login', [App\Http\Controllers\AdminController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'usersession']], function () {

    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin');

    Route::get('/profile/{id}', [App\Http\Controllers\AdminController::class, 'profiledit'])->name('profile.edit');
    Route::post('/profile/update', [App\Http\Controllers\AdminController::class, 'profileUpdate'])->name('profile.update');

    Route::get("admin/party", [AdminPartyController::class, 'index'])->name('admin.party.index');
    Route::get('admin/party/create', [AdminPartyController::class, 'create'])->name('admin.party.create');
    Route::post('admin/party/store', [AdminPartyController::class, 'store'])->name('admin.party.store');
    Route::get('admin/party/edit/{id}', [AdminPartyController::class, 'edit'])->name('admin.party.edit');
    Route::patch('admin/party/update/{id}', [AdminPartyController::class, 'update'])->name('admin.party.update');
    Route::get('admin/party/destroy/{id}', [AdminPartyController::class, 'destroy'])->name('admin.party.destroy');
    Route::get("admin/party/active/{id}", [AdminPartyController::class, 'partyActive'])->name('admin.party.active');

    Route::get("admin/plane", [AdminPlaneController::class, 'index'])->name('admin.plane.index');
    Route::get('admin/plane/create', [AdminPlaneController::class, 'create'])->name('admin.plane.create');
    Route::post('admin/plane/store', [AdminPlaneController::class, 'store'])->name('admin.plane.store');
    Route::get('admin/plane/edit/{id}', [AdminPlaneController::class, 'edit'])->name('admin.plane.edit');
    Route::patch('admin/plane/update/{id}', [AdminPlaneController::class, 'update'])->name('admin.plane.update');
    Route::get('admin/plane/destroy/{id}', [AdminPlaneController::class, 'destroy'])->name('admin.plane.destroy');
    Route::get("admin/plane/active/{id}", [AdminPlaneController::class, 'planeActive'])->name('admin.plane.active');

    Route::get("admin/plane", [AdminPlaneController::class, 'index'])->name('admin.plane.index');
    Route::get('admin/plane/create', [AdminPlaneController::class, 'create'])->name('admin.plane.create');
    Route::post('admin/plane/store', [AdminPlaneController::class, 'store'])->name('admin.plane.store');
    Route::get('admin/plane/edit/{id}', [AdminPlaneController::class, 'edit'])->name('admin.plane.edit');
    Route::patch('admin/plane/update/{id}', [AdminPlaneController::class, 'update'])->name('admin.plane.update');
    Route::get('admin/plane/destroy/{id}', [AdminPlaneController::class, 'destroy'])->name('admin.plane.destroy');
    Route::get("admin/plane/active/{id}", [AdminPlaneController::class, 'planeActive'])->name('admin.plane.active');

    Route::get("admin/diamond", [AdminDiamondController::class, 'index'])->name('admin.diamond.index');
    Route::get('admin/diamond/show/{id}', [AdminDiamondController::class, 'show'])->name('admin.diamond.show');
    Route::get('admin/diamond/create', [AdminDiamondController::class, 'create'])->name('admin.diamond.create');
    Route::post('admin/diamond/store', [AdminDiamondController::class, 'store'])->name('admin.diamond.store');
    Route::get('admin/diamond/edit/{id}', [AdminDiamondController::class, 'edit'])->name('admin.diamond.edit');
    Route::patch('admin/diamond/update/{id}', [AdminDiamondController::class, 'update'])->name('admin.diamond.update');
    Route::get('admin/diamond/destroy/{id}', [AdminDiamondController::class, 'destroy'])->name('admin.diamond.destroy');

    Route::get("admin/report", [AdminController::class, 'index'])->name('admin.report.index');
});

//Clear Cache facade value:
Route::get('/admin/clear-cache', function () {
    Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/admin/optimize', function () {
    Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/admin/route-cache', function () {
    Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/admin/route-clear', function () {
    Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/admin/view-clear', function () {
    Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/admin/config-cache', function () {
    Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
