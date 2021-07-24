<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Settings::create(['color' => '#1e1e2d'],['font' => 'Poppins, Helvetica, "sans-serif"']);
    }
}
