<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patients>
 */
class PatientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'full_name'    => fake()->name,
            'phone'    => fake()->phoneNumber,
            'occupation'    => fake()->name,
            'gender'    => fake()->boolean,
            'birthdate'    => fake()->date,
            'address'    => fake()->name,
            'smoker'    => fake()->name,
            'drinker'    => fake()->name,
            'family_dm'    => fake()->name,
            'gestational_dm'    => fake()->name,
            'weight_baby'    => fake()->name,
            'hypert'    => fake()->name,
            'family_ihd'    => fake()->name,
            'parity'    => fake()->name,
            'smbg'    => fake()->name,
            'ihd'    => fake()->name,
            'cva'    => fake()->name,
            'pvd'    => fake()->name,
            'neuro'    => fake()->name,
            'weight'    => fake()->name,
            'height'    => fake()->name,
            'wc'    => fake()->name,
            'bmi'    => fake()->name,
            'hip'    => fake()->name,
            'retino'    => fake()->name,
            'nonpro'    => fake()->name,
            'prolif'    => fake()->name,
            'macul'    => fake()->name,
            'insul'    => fake()->name,
            'amput'    => fake()->name,
            'ed'    => fake()->name,
            'nafld'    => fake()->name,
            'dermo'    => fake()->name,
            'dfoot'    => fake()->name,
            'date_insulin'    => fake()->date,
            'duration_insulin'    => fake()->numberBetween(1, 100),
            'duration_dm'    => fake()->numberBetween(1, 100),
            'glycemic'    => fake()->name,
            'lipid'    => fake()->name,
            'pressure'    => fake()->name,
            'f_height'    => fake()->randomNumber(),
            'm_height'    => fake()->randomNumber(),
            'mid_height'    => fake()->randomNumber(),
            'fa1c'    => fake()->name,
            'sa2c'    => fake()->name,
            'referral'    => fake()->name,
            'created_by'    => 1,
            'updated_by'    => 2,
            'updated_at' => fake()->dateTime,
            'created_at' => fake()->dateTime,
        ];
    }
}
