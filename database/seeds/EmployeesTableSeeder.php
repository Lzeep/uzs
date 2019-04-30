<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $employee = new \App\Employee([
                'Full_name' => Str::random(stringValue()),
                'Address' => Str::random(stringValue()),
                'Phone' => Str::length(10|10),
                'Position' => Str::random(5),
                'District' => Str::random(4),
            ]);
            $employee->save();
        }
    }
}
