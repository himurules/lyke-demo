<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Excel::import(new \App\Imports\UserImport, public_path('seeders/data.csv'), null, \Maatwebsite\Excel\Excel::CSV);
    }
}
