<?php

namespace Database\Seeders;

use App\Models\Incapacity_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Incapacity_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incapacity_type::create
        ([
            'name' => 'Enfermedad común',
        ]);     

        Incapacity_type::create
        ([
            'name' => 'Licencia de maternidad',
        ]);

        Incapacity_type::create
        ([
            'name' => 'Licencia de paternidad',
        ]);
        
        Incapacity_type::create
        ([
            'name' => 'Accidente de trabajo',
        ]);

        Incapacity_type::create
        ([
            'name' => 'Enfermedad laboral',
        ]);

        Incapacity_type::create
        ([
            'name' => 'Fondo de pensiones',
        ]);

        Incapacity_type::create
        ([
            'name' => 'Accidente de tránsito',
        ]);  
    }
}
