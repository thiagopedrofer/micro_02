<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class CompanyService
{
    public function getCompany(string $company)
    {
        $token = config('services.micro_01.token');

        $endpoint = config('services.micro_01.baseUrl')."/api/company/{$company}";

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => $token
        ])->get($endpoint);

        return $response->json();
    }
}
