<?php

use App\Livewire\Page\Company\CompanyCreate;
use App\Livewire\Page\Company\CompanyIndex;
use App\Livewire\Page\Company\CompanyShow;
use App\Livewire\Page\Dashboard\DashboardIndex;
use App\Livewire\Page\Property\PropertyCreate;
use App\Livewire\Page\Property\PropertyIndex;
use App\Livewire\Page\Property\PropertyShow;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/isunregister', function () {return view('auth.user-status');})->name('auth.is_unregister');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'is_unregister',
])->group(function () {
    Route::get('/dashboard', DashboardIndex::class)->middleware('can:dashboard.index')->name('dashboard.index');
    
    Route::get('/company', CompanyIndex::class)->middleware('can:companies.index')->name('companies.index');
    Route::get('/company/create/{companyId?}', CompanyCreate::class)->middleware('can:companies.create')->name('companies.create');
    Route::get('/company/{companyId}/show', CompanyShow::class)->middleware('can:companies.show')->name('companies.show');

    Route::get('/property', PropertyIndex::class)->middleware('can:properties.index')->name('properties.index');
    Route::get('/property/create/{propertyId?}', PropertyCreate::class)->middleware('can:properties.create')->name('properties.create');
    Route::get('/property/{propertyId}/show', PropertyShow::class)->middleware('can:properties.show')->name('properties.show');
});
