<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tickets')->insert([
            [
                'date' => '1996-01-2',
                'price' => '22',
                'train_id' => 3,
                'ticket_type_id' => 3
            ],
            [
                'date' => '2012-12-12',
                'price' => '12',
                'train_id' => 1,
                'ticket_type_id' => 2
            ],
            [
                'date' => '2013-11-3',
                'price' => '120',
                'train_id' => 2,
                'ticket_type_id' => 2
            ]
        ]);
    }
}
