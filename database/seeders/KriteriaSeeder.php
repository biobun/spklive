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
        DB::table('kriterias')->insert([
        [
            'name' => 'Suhu',
            'bobot' => 20,
            'type_data' => 'angka',
            'lambang' => '°C',
            'col_name' => 'suhu',
            'order' => 1,
        ],
        [
            'name' => 'Kelembapan',
            'bobot' => 10,
            'type_data' => 'angka',
            'lambang' => '%',
            'col_name' => 'kelembapan',
            'order' => 3,
        ],
        [
            'name' => 'Drainase',
            'bobot' => 10,
            'type_data' => 'pilihan',
            'lambang' => '',
            'col_name' => 'drainase',
            'order' => 4,
        ],
        [
            'name' => 'Tekstur',
            'bobot' => 10,
            'type_data' => 'pilihan',
            'lambang' => '',
            'col_name' => 'tekstur',
            'order' => 5,
        ],
        [
            'name' => 'Kedalaman tanah',
            'bobot' => 7,
            'type_data' => 'angka',
            'lambang' => 'cm',
            'col_name' => 'kedalaman_tanah',
            'order' => 6,
        ],
        [
            'name' => 'Keasaman',
            'bobot' => 10,
            'type_data' => 'angka',
            'lambang' => '',
            'col_name' => 'keasaman',
            'order' => 7,
        ],
        [
            'name' => 'Lereng',
            'bobot' => 5,
            'type_data' => 'angka',
            'lambang' => '%',
            'col_name' => 'lereng',
            'order' => 8,
        ],
        [
            'name' => 'Curah Hujan',
            'bobot' => 20,
            'type_data' => 'angka',
            'lambang' => 'mm',
            'col_name' => 'curah_hujan',
            'order' => 2,
        ],
        [
            'name' => 'Bahaya Banjir',
            'bobot' => 8,
            'type_data' => 'pilihan2',
            'lambang' => '',
            'col_name' => 'bahaya_banjir',
            'order' => 9,
        ]]
    );
    }
}
