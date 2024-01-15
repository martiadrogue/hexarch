<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($index=0; $index < 10; $index++) {
            DB::table('users')->insert([
                'first_name' => 'default' . $index,
                'last_name' => 'default' . $index,
                'email' => Str::random(10) . '@default.com',
                'cellphone' => '123456789',
                'password' => password_hash('default' . Str::random(10), PASSWORD_DEFAULT),
                'state_id' => rand(1, 4),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
