<?php

namespace App\Providers;

use Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;       
use App\Models\Company;                     
use Illuminate\Support\Facades\Schema;      

use App\Models\User;
use App\Observers\UserObserver;

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
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Superadmin') ? true : null;
        });

        try {
            View::composer('*', function ($view) {
                if (Schema::hasTable('company_profile')) {
                    $view->with('company', Company::first());
                }
            });
        } catch (\Exception $e) {
            \Log::warning('Company profile sharing skipped: ' . $e->getMessage());
        }
        try {
            if (Schema::hasTable('users')) {
                User::observe(UserObserver::class);
            }
        } catch (\Exception $e) {
            // Prevent crash during artisan commands/migrations
        }
    }
}
