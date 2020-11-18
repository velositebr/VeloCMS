<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Event;
use App\Models\Banner;
use App\Models\Album;
use App\Observers\AvatarUserObserver;
use App\Observers\EventImageObserver;
use App\Observers\ImageAlbumObserver;
use App\Observers\ImageBannerObserver;
use Illuminate\Support\Facades\URL;

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
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        User::observe(AvatarUserObserver::class);
        Event::observe(EventImageObserver::class);
        Banner::observe(ImageBannerObserver::class);
        Album::observe(ImageAlbumObserver::class);
    }
}
