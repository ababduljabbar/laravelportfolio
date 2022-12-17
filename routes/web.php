<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\MainpageController;
use App\Http\Controllers\ServicepageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TeamController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [BackendController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/main', [MainpageController::class, 'index'])->name('admin.main');
Route::put('/admin/main', [MainpageController::class, 'update'])->name('admin.update');

Route::get('/admin/service/create', [ServicepageController::class, 'index'])->name('admin.service.create');
Route::post('/admin/service/create', [ServicepageController::class, 'store'])->name('admin.service.store');
Route::get('/admin/service/list', [ServicepageController::class, 'list'])->name('admin.service.list');
Route::get('/admin/service/edit/{id}', [ServicepageController::class, 'edit'])->name('admin.service.edit');
Route::patch('/admin/service/edit/{id}', [ServicepageController::class, 'update'])->name('admin.service.update');
Route::delete('/admin/service/delete/{id}', [ServicepageController::class, 'destroy'])->name('admin.service.delete');

Route::get('/admin/portfolio/create', [PortfolioController::class, 'index'])->name('admin.portfolio.create');
Route::put('/admin/portfolio/create', [PortfolioController::class, 'store'])->name('admin.portfolio.store');
Route::get('/admin/portfolio/list', [PortfolioController::class, 'list'])->name('admin.portfolio.list');
Route::get('/admin/portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('admin.portfolio.edit');
Route::patch('/admin/portfolio/edit/{id}', [PortfolioController::class, 'update'])->name('admin.portfolio.update');
Route::delete('/admin/portfolio/delete/{id}', [PortfolioController::class, 'destroy'])->name('admin.portfolio.delete');

Route::get('/admin/about/create', [AboutController::class, 'index'])->name('admin.about.create');
Route::put('/admin/about/create', [AboutController::class, 'store'])->name('admin.about.store');
Route::get('/admin/about/list', [AboutController::class, 'list'])->name('admin.about.list');
Route::get('/admin/about/edit/{id}', [AboutController::class, 'edit'])->name('admin.about.edit');
Route::patch('/admin/about/edit/{id}', [AboutController::class, 'update'])->name('admin.about.update');
Route::delete('/admin/about/delete/{id}', [AboutController::class, 'destroy'])->name('admin.about.delete');

Route::get('/admin/team/create', [TeamController::class, 'index'])->name('admin.team.create');
Route::put('/admin/team/create', [TeamController::class, 'store'])->name('admin.team.store');
Route::get('/admin/team/list', [TeamController::class, 'list'])->name('admin.team.list');
Route::get('/admin/team/edit/{id}', [TeamController::class, 'edit'])->name('admin.team.edit');
Route::patch('/admin/team/edit/{id}', [TeamController::class, 'update'])->name('admin.team.update');
Route::delete('/admin/team/delete/{id}', [TeamController::class, 'destroy'])->name('admin.team.delete');

Auth::routes();

