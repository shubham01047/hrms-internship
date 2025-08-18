<?php

namespace App\Providers;

use Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;        // ✅ Required to use View::share
use App\Models\Company;                     // ✅ Required to access Company model
use Illuminate\Support\Facades\Schema;      // ✅ (Optional) to safely check DB table

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
        // Optional: Prevent error if table doesn't exist during migration
        if (Schema::hasTable('company_profile')) {
            $company = Company::first();
            View::share('company', $company);
        }

        if (\Schema::hasTable('users')) {
            User::observe(UserObserver::class);
        }
    }
}
