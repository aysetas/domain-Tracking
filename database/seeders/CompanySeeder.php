<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies=[
            ["company_name"=>"Natro.com"],
            ["company_name"=>"Goddady.com"],
            ["company_name"=>"Hosting.com"],
            ["company_name"=>"Hostgator.com"],
            ["company_name"=>"Other"]
        ];
        foreach($companies as $company){
            Company::create($company);
        }
    }
}
