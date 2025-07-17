<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;        // ✅ Required to use View::share
use App\Models\Company;                     // ✅ Required to access Company model
use Illuminate\Support\Facades\Schema;      // ✅ (Optional) to safely check DB table

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
        // Optional: Prevent error if table doesn't exist during migration
        if (Schema::hasTable('companies')) {
            $company = Company::first();
            View::share('company', $company);
        }
    }
}
