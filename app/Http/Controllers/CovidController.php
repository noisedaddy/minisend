<?php

namespace App\Http\Controllers;

use App\Http\Resources\CovidResource;
use App\Services\CovidStatisticsService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CovidController extends Controller
{
    public function index(CovidStatisticsService $covidStatisticService){

        $today = Carbon::now()->toDateString();

        $confirmedCovidCasesUntilToday = $covidStatisticService->getTotalCasesByCountryAndType('macedonia', 'confirmed');
        $recoveredCovidCasesUntilToday = $covidStatisticService->getTotalCasesByCountryAndType('macedonia', 'recovered');
        $deadCovidCasesUntilToday = $covidStatisticService->getTotalCasesByCountryAndType('macedonia', 'death');

        return response()->json(['data' => $confirmedCovidCasesUntilToday]);
    }

}
