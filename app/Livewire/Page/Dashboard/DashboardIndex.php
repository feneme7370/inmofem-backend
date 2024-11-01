<?php

namespace App\Livewire\Page\Dashboard;

use App\Models\Page\Method;
use Livewire\Component;
use App\Models\Page\Property;
use App\Models\Page\PropertyType;
use Illuminate\Support\Facades\Auth;

class DashboardIndex extends Component
{
    public function render()
    {
        $properties = Property::
            select('id', 'title', 'uuid', 'price', 'status', 'is_send', 'money_id', 'method_id', 'property_type_id')
            ->with('money', 'method', 'property_type', 'features', 'allPictures', 'user', 'company')
            ->where('company_id', Auth::user()->company_id)
            ->where('is_send', 0)
            ->where('status', 1)
            ->whereNull('deleted_at')
            ->get();

        $latest_properties = Property::
            select('id', 'title', 'uuid', 'price', 'money_id', 'method_id', 'property_type_id', 'created_at')
            ->with('user', 'company', 'money', 'method', 'property_type')
            ->where('company_id', Auth::user()->company_id)
            ->where('status', 1)
            ->whereNull('deleted_at')
            ->orderBy('deleted_at', 'DESC')
            ->take(5)
            ->get();

        $latest_send_properties = Property::
            select('id', 'title', 'uuid', 'price', 'money_id', 'is_send', 'send_at', 'method_id', 'property_type_id')
            ->with('user', 'company', 'money', 'method', 'property_type')
            ->where('company_id', Auth::user()->company_id)
            ->where('is_send', 1)
            ->whereNotNull('send_at')
            ->whereNull('deleted_at')
            ->orderBy('send_at', 'DESC')
            ->take(5)
            ->get();

        $property_types = PropertyType::select('id', 'name')->get();
        $methods = Method::select('id', 'name')->get();
        return view('livewire.page.dashboard.dashboard-index', compact(
            'property_types',
            'properties',
            'methods',
            'latest_properties',
            'latest_send_properties',
        ));
    }
}
