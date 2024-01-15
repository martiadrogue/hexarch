<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    private array $states = [
        'deshabilitado',
        'activo',
        'bloqueado',
        'denegado',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->states as $state) {
            DB::table('states')->insert([
                'state' => $state,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
