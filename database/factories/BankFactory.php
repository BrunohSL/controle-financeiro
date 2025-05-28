<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank>
 */
class BankFactory extends Factory
{
    /**
     * @var string
     */
    const INTER = '4edaac5f-4caa-43d1-aa83-4ac5a8a4e404';

    /**
     * @var string
     */
    const SANTANDER = '5564a122-cb4e-4749-a354-71e36e42e628';

    /**
     * @var string
     */
    const SICOOB = '5793362d-a43f-4f64-915c-8e08a9a6a9a8';

    /**
     * @var string
     */
    const BANRISUL = '86ee959c-2fc9-46bd-82bf-244bd7b4fcd2';

    /**
     * @var string
     */
    const BANCO_DO_BRASIL = '8fa7ee5e-5717-430c-80ec-7b30fef643e2';

    /**
     * @var string
     */
    const CAIXA_ECONOMICA = '92bb51b4-de6c-4f56-b4bf-8af1b5d4dd67';

    /**
     * @var string
     */
    const SICREDI = '9e5a4643-5b9e-434d-8aea-f51f33841631';

    /**
     * @var string
     */
    const BRADESCO = 'cd180a6d-9f70-4961-83ce-74e64d2cfd21';

    /**
     * @var string
     */
    const ITAU = 'efbbb1ed-3bc8-4bec-878c-b7be120043a6';

    /**
     * @var string
     */
    const NUBANK = 'f41997d2-d91e-4db2-b0a3-de127be5fe19';

    /**
     * @var array
     */
    const BANK_IDS = [
        self::INTER,
        self::SANTANDER,
        self::SICOOB,
        self::BANRISUL,
        self::BANCO_DO_BRASIL,
        self::CAIXA_ECONOMICA,
        self::SICREDI,
        self::BRADESCO,
        self::ITAU,
        self::NUBANK
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
}
