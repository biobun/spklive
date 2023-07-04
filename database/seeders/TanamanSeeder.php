<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class TanamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tanamen')->insert([
            [
            'name' => 'Padi sawah irigasi',
            ],
            [
            'name' => 'Padi sawah tadah hujan',
            ],
            [
            'name' => 'Padi gogo',
            ],
            [
            'name' => 'Padi sawah lebak',
            ],
            [
            'name' => 'Jagung',
            ],
            [
            'name' => 'Sorgum',
            ],
            [
            'name' => 'Gandum',
            ],
        ]);
    }
    
}
