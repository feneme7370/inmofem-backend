<?php

namespace App\Providers;

use App\Models\Page\Company;
use App\Models\Page\Property;
use App\Policies\Page\CompanyPolicy;
use App\Policies\Page\ConfigPolicy;
use App\Policies\Page\PermissionPolicy;
use App\Policies\Page\PropertyPolicy;
use App\Policies\Page\RolePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        Gate::policy(Role::class, RolePolicy::class);
        Gate::policy(Permission::class, PermissionPolicy::class);
    }

}
