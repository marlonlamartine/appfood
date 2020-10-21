<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\TableResource;
use App\Services\TableService;
use Illuminate\Http\Request;

class TableApiController extends Controller
{
    protected $tableService;

    public function __construct(TableService $tableService)
    {
        $this->tableService = $tableService;
    }

    public function tablesByTenant(TenantFormRequest $request)
    {
        /*if(!$request->token_company){
            return response()->json(['message' => 'token not found'], 404);
        }*/

        $tables = $this->tableService->getTablesByUuid($request->token_company);

        return TableResource::collection($tables);
    }

    public function show(Request $request, $identify)
    {
        if(!$table = $this->tableService->getTableByIdentify($identify)){
            return response()->json(['message' => 'table not found'], 404);
        }

        return new TableResource($table);
    }
}
