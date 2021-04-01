<?php

namespace App\Foundation\Providers;

use Illuminate\Support\ServiceProvider;
use App\Foundation\Observer;
use LogicException;

class ObserverServiceProvider extends ServiceProvider
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
        $kernel = config('foundation.observer.kernel');
        $observers = $kernel::$observers;

        foreach ($observers as $model => $observer) {
            if ( ! (new $observer) instanceof Observer)
                throw new LogicException(
                    'The observer: '.$observer.' must implements '.Observer::class
                );

            $model::observe($observer);
        }
    }
}
