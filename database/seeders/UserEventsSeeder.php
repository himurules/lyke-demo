<?php

namespace Database\Seeders;

use App\Models\UserEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class UserEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserEvents::truncate();
        Excel::import(new \App\Imports\UserEventsImport, public_path('seeders/data.csv'), null, \Maatwebsite\Excel\Excel::CSV);
    }
}
