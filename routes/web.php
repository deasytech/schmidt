<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/the-company', [PageController::class, 'theCompany'])->name('the-company');
Route::get('/our-team', [PageController::class, 'ourTeam'])->name('our-team');
Route::get('/our-work/{id}', [PageController::class, 'ourWork'])->name('our-work');
Route::get('/our-works', [PageController::class, 'ourWorks'])->name('our-works');
Route::get('/news', [PageController::class, 'latestNews'])->name('latest-news');
Route::get('/news/{slug}', [PageController::class, 'latestPost'])->name('latest-post');
Route::get('/what-we-do', [PageController::class, 'whatWeDo'])->name('what-we-do');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contact-us');
Route::post('/contact', [PageController::class, 'storeContact'])->name('contact.store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Maintenance without SSH. Returns 404 unless DEPLOY_TOKEN is set in .env (see docs/redesign/SHARED_HOSTING.md).
Route::get('/_deploy/{task}', [\App\Http\Controllers\DeployController::class, 'run'])->name('deploy.task');
