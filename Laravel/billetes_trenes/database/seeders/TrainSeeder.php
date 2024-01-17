<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trains')->insert([
            [
                'name' => 'Alsa Martin',
                'passengers' => '100',
                'year' => 2007,
                'train_type_id' => 1
            ],

            [
                'name' => 'Felas & C.O',
                'passengers' => '200',
                'year' => 2001,
                'train_type_id' => 2
            ],

            [
                'name' => 'Nimbus 2000',
                'passengers' => '18',
                'year' => 2000,
                'train_type_id' => 2
            ]
        ]);
    }
}
