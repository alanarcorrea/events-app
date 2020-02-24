<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Resources\Company as CompanyResource;
use App\Http\Requests\StoreCompany;
use App\Http\Requests\UpdateCompany;
use App\Services\Companies\Store;
use App\Services\Companies\Update;
use App\Services\Companies\Destroy;

class CompanyController extends Controller
{
    public function index()
    {
        return CompanyResource::collection(Company::paginate(config('paginate.DEFAULT_PAGINATE')));
    }

    public function create()
    {
        return response()->json([
            'message' => __('messages.allowed_access'),
        ], 202);
    }

    public function store(StoreCompany $request ,Store $storeService)
    {
        try {
            $company = $storeService->handle($request);

			return (new CompanyResource($company))
					->additional(['data' => [
							'message' => __('messages.attribute_created', ['attribute' => __('attributes.company')]),
					]]);

        } catch(ExceptionAlias $exception) {
             return response()->json([
                 'error' => $exception->getMessage()
             ], 403);
        }
    }

    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    public function edit(Company $company)
    {
        return new CompanyResource($company);
    }

    public function update(Company $company, UpdateCompany $request, Update $updateService)
    {
        try {
            $updateService->handle($request, $company);

			return (new CompanyResource($company))
					->additional(['data' => [
							'message' => __('messages.attribute_updated', ['attribute' => __('attributes.company')]),
					]]);

        } catch(ExceptionAlias $exception) {
             return response()->json([
                 'error' => $exception->getMessage()
             ], 403);
        }   
    }

    
    public function destroy(Company $company, Destroy $destroyService)
    {
        try {
            $destroyService->handle($company);

            return response()->json([
			    'message' => __('messages.attribute_deleted', ['attribute' => __('attributes.skill')]),
            ], 201);

        } catch(ExceptionAlias $exception) {
             return response()->json([
                 'error' => $exception->getMessage()
             ], 403);
        }
    }
}
