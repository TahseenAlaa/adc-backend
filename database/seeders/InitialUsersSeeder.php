<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InitialUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'uuid'            => fake()->uuid(),
            'full_name'       => 'Areeb Mohammed',
            'username'        => 'areeb',
            'job_title'       => 'Web Developer',
            'created_by'      => 1,
            'last_login_ip'   => fake()->ipv4(),
            'last_login_at'   => Carbon::now(),
            'password'        => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'  => Str::random(10),
            'created_at'  => Carbon::now()

        ]);
    }
}
