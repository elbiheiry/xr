<?php

use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\ArticleController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SolutionController;
use App\Http\Controllers\Site\TeamController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
	/**
     * home page route
     */
    Route::get('/' , [HomeController::class , 'index'])->name('index');
    Route::post('/subscribe' , [HomeController::class , 'subscribe'])->name('subscribe');

    /**
     * about us routes
     */
    Route::prefix('about-us')->name('about.')->group(function (){
        Route::get('/' , [AboutController::class , 'index'])->name('index');
        Route::get('/our-partners' , [AboutController::class , 'partners'])->name('partners');
    });

    /**
     * solution route
     */
    Route::get('/solutions/{slug}' , [SolutionController::class , 'index'])->name('solution');

    /**
     * team route
     */
    Route::get('/team-members' , [TeamController::class , 'index'])->name('team');

    /**
     * contact us routes
     */
    Route::get('/contact-us' , [ContactController::class , 'index'])->name('contact');
    Route::post('/contact-us/store' , [ContactController::class , 'store'])->name('contact.store');

    /**
     * articles routes
     */
    Route::prefix('articles')->name('articles.')->group(function (){
        Route::get('/' , [ArticleController::class , 'index'])->name('index');
        Route::get('/{slug}' , [ArticleController::class , 'article'])->name('article');
        Route::post('/store/{id}' , [ArticleController::class , 'store'])->name('store');
    });
});