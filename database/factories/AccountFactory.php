<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $accountNumber = fake()->randomNumber(6, true) . "-" . fake()->randomDigit();
        $branchNumber = fake()->randomNumber(4, true) . "-" . fake()->randomDigit();

        return [
            'name' => fake()->name(),
            'bank_id' => BankFactory::BANK_IDS[array_rand(BankFactory::BANK_IDS)], // Salvar no banco e pegar daqui
            'number' => $accountNumber,
            'branch' => $branchNumber,
            'opening_balance' => fake()->numberBetween(1000, 1000000),
        ];
    }
}
