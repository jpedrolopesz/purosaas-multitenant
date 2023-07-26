<?php

namespace Database\Factories;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tenant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'email' => $this->faker->unique()->safeEmail,
            'stripe_id' => Str::random(10), // Substitua conforme necessário
            'pm_type' => $this->faker->creditCardType,
            'pm_last_four' => substr($this->faker->creditCardNumber, -4),
            'trial_ends_at' => now()->addDays(10),
            'data' => json_encode($this->faker->sentence), // Substitua conforme necessário
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
