<?php

namespace App\Repositories\Companies;

use App\Models\Company;
use App\Models\User;
use App\Support\Enums\UserRole;

class CompaniesRepo
{
    public function getAllowedQueryFor(User $user)
    {
        $q = Company::query();

        if ($user->role === UserRole::ACCOUNT_ADMIN) {
            $q->where('account_id', $user->account_id);
        }
        else if ($user->role === UserRole::ACCOUNT_MANAGER) {
            $userCompanies = $user->companies()->pluck('id');

            $q->whereIn('id', $userCompanies);
        }

        return $q;
    }
}
