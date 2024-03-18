<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\MemberLinkController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\SolutionController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WorkController;
use Illuminate\Support\Facades\Auth;
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

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/' , [DashboardController::class , 'index'])->name('dashboard');

    /**
     * messages routes
     */
    Route::prefix('messages')->name('messages.')->group(function ()
    {
        Route::get('/' , [MessageController::class , 'index'])->name('index');
        Route::get('/show/{id}' , [MessageController::class , 'show'])->name('show');
        Route::delete('/destroy/{id}' , [MessageController::class , 'destroy'])->name('delete');
    });

    /**
     * subscribers routes
     */
    Route::prefix('subscribers')->name('subscribers.')->group(function ()
    {
        Route::get('/' , [SubscriberController::class , 'index'])->name('index');
        Route::delete('/destroy/{id}' , [SubscriberController::class , 'destroy'])->name('delete');
    });

    /**
     * settings routes
     */
    Route::prefix('site-settings')->name('settings.')->group(function ()
    {
        Route::get('/' , [SettingsController::class , 'index'])->name('index');
        Route::put('/update' , [SettingsController::class , 'update'])->name('update');
    });

    /**
     * home-content routes
     */
    Route::prefix('homepage')->name('home.')->group(function ()
    {
        Route::get('/' , [HomeController::class , 'index'])->name('index');
        Route::put('/update' , [HomeController::class , 'update'])->name('update');
    });
    
    /**
     * profile routes
     */
    Route::prefix('profile')->name('profile.')->group(function ()
    {
        Route::get('/' , [ProfileController::class , 'index'])->name('index');
        Route::put('/update' , [ProfileController::class , 'update'])->name('update');
    });

    /**
     * articles routes
     */
    Route::prefix('articles')->name('articles.')->group(function(){
        Route::get('/' , [ArticleController::class , 'index'])->name('index');
        Route::get('/create' , [ArticleController::class , 'create'])->name('create');
        Route::post('/store' , [ArticleController::class , 'store'])->name('store');
        Route::get('/edit/{id}' ,[ArticleController::class , 'edit'])->name('edit');
        Route::put('/update/{id}' , [ArticleController::class , 'update'])->name('update');
        Route::delete('/delete/{id}' , [ArticleController::class , 'destroy'])->name('delete');
    });

    /**
     * solutions routes
     */
    Route::prefix('solutions')->name('solutions.')->group(function(){
        Route::get('/' , [SolutionController::class , 'index'])->name('index');
        Route::get('/create' , [SolutionController::class , 'create'])->name('create');
        Route::post('/store' , [SolutionController::class , 'store'])->name('store');
        Route::get('/edit/{id}' ,[SolutionController::class , 'edit'])->name('edit');
        Route::put('/update/{id}' , [SolutionController::class , 'update'])->name('update');
        Route::delete('/delete/{id}' , [SolutionController::class , 'destroy'])->name('delete');
    });

    /**
     * members routes
     */
    Route::prefix('team')->name('members.')->group(function(){
        Route::get('/' , [MemberController::class , 'index'])->name('index');
        Route::get('/create' , [MemberController::class , 'create'])->name('create');
        Route::post('/store' , [MemberController::class , 'store'])->name('store');
        Route::get('/edit/{id}' ,[MemberController::class , 'edit'])->name('edit');
        Route::put('/update/{id}' , [MemberController::class , 'update'])->name('update');
        Route::delete('/delete/{id}' , [MemberController::class , 'destroy'])->name('delete');

        /**
         * links routes
         */
        Route::prefix('links')->name('links.')->group(function(){
            Route::get('/{id}' , [MemberLinkController::class , 'index'])->name('index');
            Route::post('/store/{id}' , [MemberLinkController::class , 'store'])->name('store');
            Route::get('/edit/{id}' ,[MemberLinkController::class , 'edit'])->name('edit');
            Route::put('/update/{id}' , [MemberLinkController::class , 'update'])->name('update');
            Route::delete('/delete/{id}' , [MemberLinkController::class , 'destroy'])->name('delete');
        });
    });

    /**
     * social-links routes
     */
    Route::prefix('social-links')->name('links.')->group(function(){
        Route::get('/' , [SocialLinkController::class , 'index'])->name('index');
        Route::post('/store' , [SocialLinkController::class , 'store'])->name('store');
        Route::get('/edit/{id}' ,[SocialLinkController::class , 'edit'])->name('edit');
        Route::put('/update/{id}' , [SocialLinkController::class , 'update'])->name('update');
        Route::delete('/delete/{id}' , [SocialLinkController::class , 'destroy'])->name('delete');
    });

    /**
     * about routes
     */
    Route::prefix('about-us')->group(function(){
        Route::get('/' , [AboutController::class , 'index'])->name('about.index');
        Route::put('/update' , [AboutController::class , 'update'])->name('about.update');

        /**
         * works routes
         */
        Route::prefix('work-process')->name('works.')->group(function(){
            Route::get('/' , [WorkController::class , 'index'])->name('index');
            Route::get('/create' , [WorkController::class , 'create'])->name('create');
            Route::post('/store' , [WorkController::class , 'store'])->name('store');
            Route::get('/edit/{id}' ,[WorkController::class , 'edit'])->name('edit');
            Route::put('/update/{id}' , [WorkController::class , 'update'])->name('update');
            Route::delete('/delete/{id}' , [WorkController::class , 'destroy'])->name('delete');
        });
        
        /**
         * testimonials routes
         */
        Route::prefix('testimonials')->name('testimonials.')->group(function(){
            Route::get('/' , [TestimonialController::class , 'index'])->name('index');
            Route::get('/create' , [TestimonialController::class , 'create'])->name('create');
            Route::post('/store' , [TestimonialController::class , 'store'])->name('store');
            Route::get('/edit/{id}' ,[TestimonialController::class , 'edit'])->name('edit');
            Route::put('/update/{id}' , [TestimonialController::class , 'update'])->name('update');
            Route::delete('/delete/{id}' , [TestimonialController::class , 'destroy'])->name('delete');
        });

        /**
         * partners routes
         */
        Route::prefix('our-partners')->name('partners.')->group(function(){
            Route::get('/' , [PartnerController::class , 'index'])->name('index');
            Route::post('/store' , [PartnerController::class , 'store'])->name('store');
            Route::get('/edit/{id}' ,[PartnerController::class , 'edit'])->name('edit');
            Route::put('/update/{id}' , [PartnerController::class , 'update'])->name('update');
            Route::delete('/delete/{id}' , [PartnerController::class , 'destroy'])->name('delete');
        });
    });
});
