<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class IncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $accountIds = Account::pluck('id')->toArray();

        return [
            'account_id' => $accountIds[array_rand($accountIds)], // Salvar no banco e pegar daqui
            'value' => fake()->numberBetween(100, 10000),
            'date' => fake()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
