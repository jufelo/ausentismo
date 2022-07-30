<?php

namespace Database\Seeders;

use App\Models\Incapacity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncapacitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Incapacity::create([

            'start_date' => '2022-01-03',
            'end_date' => '2022-03-05',
            'clasification' => 'Inicial',
            'incapacity_type_id' => 7,
            'employee_id' => 2,

        ]);

    }
}
