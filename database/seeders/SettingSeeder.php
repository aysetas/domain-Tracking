<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();
        DB::table('settings')->insert([
            'site_title' => 'Domain Takip',
            'site_desc' => 'Domain Takip',
            'site_email' => 'info@domaintakip.com'
        ]);
    }
}
