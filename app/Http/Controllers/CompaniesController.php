<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Repositories\Companies\CompaniesRepo;
use Illuminate\Support\Facades\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CompaniesController extends Controller
{
    protected $companiesRepo;

    public function __construct(CompaniesRepo $companiesRepo)
    {
        $this->companiesRepo = $companiesRepo;
    }

    public function index()
    {
        $user = auth()->user();

        if (!$user->can('viewAny', Company::class)) {
            return $this->forbidden();
        }

        $query = $this->companiesRepo->getAllowedQueryFor($user);

        $companies = QueryBuilder::for($query)
            ->allowedFilters('name')
            ->paginate();

        return response()->json($companies);
    }
}
