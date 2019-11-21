<?php

namespace App\Repositories\Companies;

use App\Models\Company;
use App\Models\User;

class CompaniesRepo
{
    public function getAllowedQueryFor(User $user)
    {
        $q = Company::query();

        if ($user->isAccountAdmin()) {
            $q->where('account_id', $user->account_id);
        }

        return $q;
    }
}
