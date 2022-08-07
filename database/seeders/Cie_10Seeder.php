<?php

namespace Database\Seeders;

use App\Models\Cie_10;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Cie_10Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            [
                'code' => 'A000',
                'name' => 'COLERA DEBIDO A VIBRIO CHOLERAE 01, BIOTIPO CHOLERAE'
            ],

            [
                'code' => 'A001',
                'name' => 'COLERA DEBIDO A VIBRIO CHOLERAE 01, BIOTIPO EL TOR'
            ],

            [
                'code' => 'A009',
                'name' => 'COLERA, NO ESPECIFICADO'
            ],


        ];
        DB::table('cie_10s')->insert($data);
        
    }
}
