<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class, 1)->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123')
        ]);

        factory(\App\Models\User::class, 100)->create()->each(function ($user) {
            $user->save();
        });

    }
}
