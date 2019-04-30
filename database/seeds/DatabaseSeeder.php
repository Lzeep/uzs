<?php

use Illuminate\Database\Seeder;

use App\Employee;

use App\TObject;

use Faker\Factory;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmployeesTableSeeder::class);
    }
}
