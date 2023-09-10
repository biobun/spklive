<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahayaBanjirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bahaya_banjir')->insert([
            // Padi sawah irigasi
            [
                'tanaman_id' => 1,
                'value' => 5,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 1,
                'value' => 0,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 1,
                'value' => 9,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 1,
                'value' => 6,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 1,
                'value' => 14,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 1,
                'value' => 7,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 1,
                'value' => 11,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 1,
                'value' => 13,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 1,
                'value' => 10,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 1,
                'value' => 15,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 1,
                'value' => 8,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 1,
                'value' => 12,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 1,
                'value' => 16,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 1,
                'value' => 17,
                'bobot' => 1,
            ],
            [
                'tanaman_id' => 1,
                'value' => 18,
                'bobot' => 1,
            ],
            [
                'tanaman_id' => 1,
                'value' => 19,
                'bobot' => 1,
            ],
            [
                'tanaman_id' => 1,
                'value' => 20,
                'bobot' => 1,
            ],
            [
                'tanaman_id' => 1,
                'value' => 21,
                'bobot' => 0,
            ],
            [
                'tanaman_id' => 1,
                'value' => 23,
                'bobot' => 0,
            ],
            [
                'tanaman_id' => 1,
                'value' => 24,
                'bobot' => 0,
            ],
            // ---------------------------------------
            // Padi sawah tadah hujan
            [
                'tanaman_id' => 2,
                'value' => 9,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 2,
                'value' => 6,
                'bobot' => 3,
            ],
            [
                'tanaman_id' =>2,
                'value' => 10,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 2,
                'value' => 0,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 2,
                'value' => 13,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 2,
                'value' => 14,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 2,
                'value' => 8,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 2,
                'value' => 12,
                'bobot' =>2,
            ],
            [
                'tanaman_id' => 2,
                'value' => 17,
                'bobot' =>1,
            ],
            [
                'tanaman_id' => 2,
                'value' => 18,
                'bobot' =>1,
            ],
            [
                'tanaman_id' => 2,
                'value' => 19,
                'bobot' =>1,
            ],
            [
                'tanaman_id' => 2,
                'value' => 16,
                'bobot' =>1,
            ],
            // ---------------------------------------
            // Padi Gogo
            [
                'tanaman_id' => 3,
                'value' => 7,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 3,
                'value' => 11,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 3,
                'value' => 8,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 3,
                'value' => 12,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 3,
                'value' => 16,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 3,
                'value' => 15,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 3,
                'value' => 6,
                'bobot' => 1,
            ],
            [
                'tanaman_id' => 3,
                'value' => 10,
                'bobot' => 1,
            ],
            [
                'tanaman_id' => 3,
                'value' => 14,
                'bobot' => 1,
            ],
            [
                'tanaman_id' => 3,
                'value' => 18,
                'bobot' => 1,
            ],
            [
                'tanaman_id' => 3,
                'value' => 19,
                'bobot' => 1,
            ],
            [
                'tanaman_id' => 3,
                'value' => 20,
                'bobot' => 1,
            ],
            [
                'tanaman_id' => 3,
                'value' => 20,
                'bobot' => 5,
            ],
            [
                'tanaman_id' => 3,
                'value' => 9,
                'bobot' => 0,
            ],
            [
                'tanaman_id' => 3,
                'value' => 13,
                'bobot' => 0,
            ],
            [
                'tanaman_id' => 3,
                'value' => 17,
                'bobot' => 0,
            ],
            [
                'tanaman_id' => 3,
                'value' => 21,
                'bobot' => 0,
            ],
            [
                'tanaman_id' => 3,
                'value' => 22,
                'bobot' => 0,
            ],
            [
                'tanaman_id' => 3,
                'value' => 23,
                'bobot' => 0,
            ],
            [
                'tanaman_id' => 3,
                'value' => 24,
                'bobot' => 0,
            ],
            // ---------------------------------------
            // Padi Sawah lebak
            [
                'tanaman_id' => 4,
                'value' => 5,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 4,
                'value' => 9,
                'bobot' => 1,
            ],
            [
                'tanaman_id' => 4,
                'value' => 13,
                'bobot' => 1,
            ],
            // ---------------------------------------
            // Jagung
            [
                'tanaman_id' => 5,
                'value' => 0,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 5,
                'value' => 2,
                'bobot' => 2,
            ],
            [
                'tanaman_id' => 5,
                'value' => 2,
                'bobot' => 1,
            ],
            // ---------------------------------------
            // Sorgum
            [
                'tanaman_id' => 6,
                'value' => 0,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 6,
                'value' => 1,
                'bobot' => 1,
            ],
            // ---------------------------------------
            // Gandum
            [
                'tanaman_id' => 7,
                'value' => 0,
                'bobot' => 3,
            ],
            [
                'tanaman_id' => 7,
                'value' => 1,
                'bobot' => 1,
            ],
        ]);
    }
}
