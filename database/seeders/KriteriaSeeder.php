<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kriterias')->insert([[
            'name' => 'Suhu',
            'bobot' => 20,
            'type_data' => 'angka',
            'lambang' => '°C',
            'col_name' => 'suhu',
        ],
        [
            'name' => 'Kelembapan',
            'bobot' => 20,
            'type_data' => 'angka',
            'lambang' => '%',
            'col_name' => 'kelembapan',
        ],
        [
            'name' => 'Drainase',
            'bobot' => 10,
            'type_data' => 'pilihan',
            'lambang' => '',
            'col_name' => 'drainase',
        ],
        [
            'name' => 'Tekstur',
            'bobot' => 10,
            'type_data' => 'pilihan',
            'lambang' => '',
            'col_name' => 'tekstur',
        ],
        [
            'name' => 'Kedalaman tanah',
            'bobot' => 10,
            'type_data' => 'angka',
            'lambang' => 'cm',
            'col_name' => 'kedalaman_tanah',
        ],
        [
            'name' => 'Keasaman',
            'bobot' => 10,
            'type_data' => 'angka',
            'lambang' => '',
            'col_name' => 'keasaman',
        ],
        [
            'name' => 'Lereng',
            'bobot' => 10,
            'type_data' => 'angka',
            'lambang' => '%',
            'col_name' => 'lereng',
        ],
        [
            'name' => 'Bahaya Banjir',
            'bobot' => 10,
            'type_data' => 'pilihan',
            'lambang' => '',
            'col_name' => 'bahaya_banjir',
        ]]
    );
    }
}
