<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create
        ([
            'name' => 'Juan',
            'lastname' => 'López',
            'ti' => 'Cédula',
            'identification' => '123456789',
            'salary' => '1000000',
            'position' => 'Desarrollador Web',
            'work_area' => 'Desarrollo',
            'eps' => 'Sura',
            'arl' => 'Sura',
            'afp' => 'Protección'
        ]);

        Employee::create
        ([
            'name' => 'Mateo',
            'lastname' => 'López',
            'ti' => 'Cédula',
            'identification' => '987654321',
            'salary' => '2000000',
            'position' => 'Gerente',
            'work_area' => 'Comercial',
            'eps' => 'Sura',
            'arl' => 'Sura',
            'afp' => 'Protección'
        ]);

    }
}
