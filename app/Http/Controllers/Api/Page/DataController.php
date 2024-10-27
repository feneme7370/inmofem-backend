<?php

namespace App\Http\Controllers\Api\Page;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Page\CompanyResource;
use App\Http\Resources\Api\Page\FeatureResource;
use App\Http\Resources\Api\Page\MethodResource;
use App\Http\Resources\Api\Page\PropertyResource;
use App\Http\Resources\Api\Page\PropertyTypeResource;
use App\Models\Page\Company;
use App\Models\Page\Feature;
use App\Models\Page\Method;
use App\Models\Page\Property;
use App\Models\Page\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company)
    {
        $companyData = Company::where('id', $company->id)->where('status', 1)->whereNull('deleted_at')->orderBy('name', 'ASC')->get();
        $responseCompany = CompanyResource::collection($companyData);

        $propertyData = Property::where('company_id', $company->id)->where('status', 1)->whereNull('deleted_at')->orderBy('title', 'ASC')->get();
        $responseProperty = PropertyResource::collection($propertyData);

        $propertyTypeData = PropertyType::where('status', 1)->orderBy('name', 'ASC')->get();
        $responsePropertyType = PropertyTypeResource::collection($propertyTypeData);

        $methodData = Method::where('status', 1)->orderBy('name', 'ASC')->get();
        $responseMethod = MethodResource::collection($methodData);

        $featureData = Feature::where('status', 1)->orderBy('name', 'ASC')->get();
        $responseFeature = FeatureResource::collection($featureData);


        return [
            'responseCompany' => $responseCompany,
            'responseProperty' => $responseProperty,
            'responsePropertyType' => $responsePropertyType,
            'responseMethod' => $responseMethod,
            'responseFeature' => $responseFeature,
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
