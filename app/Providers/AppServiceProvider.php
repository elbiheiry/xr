<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\Solution;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!app()->runningInConsole()) {
            view()->share([
                'social_links' => SocialLink::all()->sortByDesc('id'),
                'settings' => Setting::firstOrFail(),
                'services' => Solution::all()->sortByDesc('id')
            ]);
        };
    }
}
