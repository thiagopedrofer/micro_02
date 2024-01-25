<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvaluationRequest;
use App\Models\Evaluantion;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{

    public function index(string $company): \Illuminate\Http\JsonResponse
    {
        $evaluation = Evaluantion::query()->where('company', $company)->get();

        return response()->json($evaluation);
    }

    public function store(EvaluationRequest $request, $company): \Illuminate\Http\JsonResponse
    {
        $CompanyService = (new CompanyService())->getCompany($company);

        if (!data_get($CompanyService, 'error')) {
            $evaluation = Evaluantion::query()->create([
                'company' => data_get($CompanyService, 'data.company.uuid'),
                'comment' => $request->input('comment'),
                'stars' => $request->input('stars')
            ]);

            return response()->json($evaluation);
        }

        return response()->json([
            'message' => 'Invalid Company'
        ]);
    }


}
