<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Resources\Company as CompanyResource;
use App\Http\Requests\StoreCompany;
use App\Services\Companies\Store;

class CompanyController extends Controller
{
    public function index()
    {
        return CompanyResource::collection(Company::paginate(config('paginage.DEFAULT_PAGINATE')));
    }

    public function create()
    {
        return response()->json([
            'message' => __('messages.allowed_access'),
        ], 202);
    }

    public function store(StoreCompany $request, Store $storeService)
    {
        try {
            $company = $storeService->handle($request);

			return (new CompanyResource($skill))
					->additional(['data' => [
							'message' => 'company criada com sucesso',
					]]);

        } catch(ExceptionAlias $exception) {
             return response()->json([
                 'error' => $exception->getMessage()
             ], 403);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
