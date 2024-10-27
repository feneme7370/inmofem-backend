<?php

namespace App\Providers;

use App\Models\Page\Company;
use App\Models\Page\Property;
use App\Policies\Page\CompanyPolicy;
use App\Policies\Page\PropertyPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::policy(Company::class, CompanyPolicy::class);
        Gate::policy(Property::class, PropertyPolicy::class);
    }

}
