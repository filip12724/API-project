<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Attendee;
use Illuminate\Support\Facades\Gate;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(
                $request->user()?->id ?: $request->ip()
            );
        });

//        Gate::define('update-post', function ($user, Event $event) {      OVO NE TREBA JER IMAM POLISE
//                                                                          GEJTOVI SU ZA NEKE JEDNOSTAVNIJE STVARI
//            return $user->id === $event->user_id;
//        });
//
//        Gate::define('delete-attendee',function($user,Event $event,Attendee $attendee){
//           return $user->id === $event->user_id || $user->id === $attendee->user_id;
//        });

    }
}
