<?php


namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Client;

class CovidStatisticsService
{
    public function getTotalCasesByCountryAndType($country, $type)
    {
        $today = Carbon::now()->toDateString();

        $httpClient = new Client();
        $request =
            $httpClient
                ->get("https://api.covid19api.com/total/country/${country}/status/${type}?from=${today}&to=${today}");

        $response = json_decode($request->getBody()->getContents());

        return $response[count($response) - 1];
    }
}
