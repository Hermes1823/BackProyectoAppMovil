<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TipoGasto extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipogastos')->insert([
            [
                'IdTipogasto' => 1,
                'Descripcion' => 'Transporte',
            ],
            [
                'IdTipogasto' => 2,
                'Descripcion' => 'Alimentación',
            ],
            [
                'IdTipogasto' => 3,
                'Descripcion' => 'Hospedaje',
            ],
            [
                'IdTipogasto' => 4,
                'Descripcion' => 'Otros',
            ],
        ]);
    }
}
