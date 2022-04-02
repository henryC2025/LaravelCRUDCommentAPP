<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxRESULTSCRUDController;
use App\Http\Controllers\AjaxTERMINOLOGYCRUDController;
use App\Http\Controllers\AjaxCOMMENTCRUDController;
use App\Http\Controllers\AjaxVALIDATECRUDController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


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

Route::get('ajax-all-comments-crud', [AjaxCOMMENTCRUDController::class, 'index']);
Route::get('ajax-validate-crud', [AjaxVALIDATECRUDController::class, 'index']);
Route::get('ajax-edit-crud', [AjaxVALIDATECRUDController::class, 'indexEdit']);
Route::get('ajax-results-crud', [AjaxRESULTSCRUDController::class, 'index']);
Route::get('ajax-terminology-crud', [AjaxTERMINOLOGYCRUDController::class, 'index']);


Route::post('add-update-result-comment', [AjaxRESULTSCRUDController::class, 'store']);
Route::post('edit-result-comment', [AjaxRESULTSCRUDController::class, 'edit']);
Route::post('delete-result-comment', [AjaxRESULTSCRUDController::class, 'destroy']);

Route::post('add-update-terminology-comment', [AjaxTERMINOLOGYCRUDController::class, 'store']);
Route::post('edit-terminology-comment', [AjaxTERMINOLOGYCRUDController::class, 'edit']);
Route::post('delete-terminology-comment', [AjaxTERMINOLOGYCRUDController::class, 'destroy']);

Route::get('comment-message', function () {
    return view('comment-message');
});

