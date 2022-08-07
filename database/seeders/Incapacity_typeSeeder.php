<?php

namespace Database\Seeders;

use App\Models\Incapacity_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Incapacity_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Enfermedad común',
            ],   

            [
                'name' => 'Licencia de maternidad',
            ],

            [
                'name' => 'Licencia de paternidad',
            ],
            
            [
                'name' => 'Accidente de trabajo',
            ],

            [
                'name' => 'Enfermedad laboral',
            ],

            [
                'name' => 'Fondo de pensiones',
            ],

            [
                'name' => 'Accidente de tránsito',
            ],
        ];    
        DB::table('Incapacity_types')->insert($data);
    }
}
