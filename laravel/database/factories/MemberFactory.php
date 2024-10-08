<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_id' => rand(1, 4),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender_id' => rand(1, 4),
            'job_title' => $this->faker->jobTitle(),
            'current_employer' => $this->faker->company,

            'home_address' => $this->faker->address(),
            'home_phone' => $this->faker->phoneNumber(),
            'home_mobile' => $this->faker->phoneNumber(),
            'home_email' => $this->faker->email(),

            'work_address' => $this->faker->address(),
            'work_phone' => $this->faker->phoneNumber(),
            'work_mobile' => $this->faker->phoneNumber(),
            'work_email' => $this->faker->email(),

            'membership_type_id' => rand(1, 5),
            'user_id' => User::factory(),
            'membership_status_id' => rand(1, 6),
        ];
    }
}
