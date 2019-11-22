<?php

use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class, 5)->create([
            'role' => \App\Support\Enums\UserRole::SUPER_ADMIN
        ]);

        // evaluators
        factory(\App\Models\User::class, 10)->create([
            'role' => \App\Support\Enums\UserRole::EVALUATOR
        ]);


        // accounts
        factory(\App\Models\Account::class, 30)->create()->each(function ($account) {
            // companies
            $account
                ->companies()
                ->createMany(
                    factory(\App\Models\Company::class, rand(1, 4))
                        ->make()
                        ->toArray()
                );

            // user account admins
            factory(\App\Models\User::class, rand(1, 3))
                ->create([
                    'role' => \App\Support\Enums\UserRole::ACCOUNT_ADMIN,
                    'account_id' => $account->id
                ]);

            // user account managers
            factory(\App\Models\User::class, rand(1, 3))
                ->create([
                    'role' => \App\Support\Enums\UserRole::ACCOUNT_MANAGER,
                    'account_id' => $account->id
                ]);
        });

        // sync managers with companies
        $managers = \App\Models\User::where('role', \App\Support\Enums\UserRole::ACCOUNT_MANAGER)->get();

        foreach ($managers as $manager) {
            $companies = \App\Models\Company::where('account_id', $manager->account_id)->limit(rand(1, 4))->get();
            $manager->companies()->attach($companies->pluck('id'));
        }

        // company divisions
        $companies = \App\Models\Company::all();

        foreach ($companies as $company) {
            factory(\App\Models\Division::class, rand(0, 3))
                ->create([
                    'company_id' => $company->id
                ]);
        }


    }
}
