<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Notification;
use App\Models\DoctorStatusIndicators;

class NotificationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('layouts.admin', function ($view) {
            $notifications = Notification::where('user_id', auth()->user()->id)
                ->orderByDesc('created_at')->take(4)->get();
            $count = Notification::where('user_id', auth()->user()->id)
                ->where('read', 0)->count();
            $DoctorStatusData = DoctorStatusIndicators::all();
            $view->with('notifications', $notifications);
            $view->with('DoctorStatusData', $DoctorStatusData);
            $view->with('count', $count);
        });
    }
}