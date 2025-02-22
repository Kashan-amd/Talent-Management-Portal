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

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('frontend.home');

Route::get('/dashboard', function () {
    return view('/auth/login');
});

Auth::routes(); 
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/dashboard', [App\Http\Controllers\HomeController::class, 'searchTalent'])->name('searchtalent');
Auth::routes();
Route::post('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/talentinfo/{talentid}', [App\Http\Controllers\TalentController::class, 'talentinfo'])->name('talentinfo');
Route::post('/updatetalent', [App\Http\Controllers\TalentController::class, 'update'])->name('updatetalent');
Route::post('/filtertalents', [App\Http\Controllers\TalentController::class, 'filterTalent'])->name('filtertalents');

#region category
Route::get('/category', [App\Http\Controllers\TalentCategoryController::class, 'create'])->name('create.category');
Route::post('/storecategory', [App\Http\Controllers\TalentCategoryController::class, 'store'])->name('store.category');
Route::get('/deletecategory/{talentCategory}', [App\Http\Controllers\TalentCategoryController::class, 'destroy'])->name('deletecategory');
Route::get('/getcategory/{talentCategory}', [App\Http\Controllers\TalentCategoryController::class, 'edit'])->name('getcategory');
Route::get('/updatecategory/{name}/{id}', [App\Http\Controllers\TalentCategoryController::class, 'update'])->name('updatecategory');
#endregion
 
#region booker
//we are using users table/model for bookers
Route::get('/booker', [App\Http\Controllers\HomeController::class, 'booker'])->name('create.booker');
Route::post('/storebooker', [App\Http\Controllers\HomeController::class, 'storeBooker'])->name('store.booker');
Route::get('/deletebooker/{userId}', [App\Http\Controllers\HomeController::class, 'deletebooker'])->name('deletebooker');
Route::get('/getbooker/{userId}', [App\Http\Controllers\HomeController::class, 'editBooker'])->name('getbooker');
Route::get('/updatebooker/{booker}', [App\Http\Controllers\HomeController::class, 'updateBooker'])->name('updatebooker');
#endregion

#region talent
Route::get('/talent', [App\Http\Controllers\TalentController::class, 'create'])->name('create.talent');
Route::post('/storetalent', [App\Http\Controllers\TalentController::class, 'store'])->name('store.talent');
Route::get('/deletetalent/{talents}', [App\Http\Controllers\TalentController::class, 'destroy'])->name('deletetalent');
#endregion

#region utility
Route::get('/utility', [App\Http\Controllers\UtilityController::class, 'index'])->name('create.utility');
Route::post('/storerace', [App\Http\Controllers\UtilityController::class, 'storeRace'])->name('store.race');
Route::get('/deleterace/{race}', [App\Http\Controllers\UtilityController::class, 'destroyRace'])->name('deleterace');

Route::post('/storeeyes', [App\Http\Controllers\UtilityController::class, 'storeEyes'])->name('store.eyes');
Route::get('/deleteeyes/{eyes}', [App\Http\Controllers\UtilityController::class, 'destroyEyes'])->name('deleteeyes');

Route::post('/storehair', [App\Http\Controllers\UtilityController::class, 'storeHair'])->name('store.hair');
Route::get('/deletehair/{hair}', [App\Http\Controllers\UtilityController::class, 'destroyHair'])->name('deletehair');
#endregion

Route::get('/test', function() {
    $img = Image::make('/upload/profile/foo.jpg')->resize(300, 200);
    return $img->response('jpg');
});
