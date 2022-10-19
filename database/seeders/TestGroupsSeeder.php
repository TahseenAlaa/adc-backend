<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testGroups = [
            ['group1', 'test1', 3, 7, 'unit'],
            ['group2', 'test2', 3, 7, 'unit'],
            ['group3', 'test3', 3, 7, 'unit'],
            ['group4', 'test4', 3, 7, 'unit'],
            ['group5', 'test5', 3, 7, 'unit'],
        ];

        foreach ($testGroups as $group) {
            DB::table('esite_test_groups')->insert([
                'test_group'            => $group[0],
                'test_name'             => $group[1],
                'min_range'             => $group[2],
                'max_range'             => $group[3],
                'measurement_unit'      => $group[4],
                'created_by'            => 1,
                'created_at'            => Carbon::now()
            ]);
        }
    }
}
