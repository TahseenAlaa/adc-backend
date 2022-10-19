<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SymptomsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $symptomsTypes = [
            'symptom1',
            'symptom2',
            'symptom3',
            'symptom4',
            'symptom5',
        ];

        foreach ($symptomsTypes as $type) {
            DB::table('esite_symptoms_types')->insert([
                'title'       => $type,
                'created_by'  => 1,
                'created_at'  => Carbon::now()
            ]);
        }
    }
}
