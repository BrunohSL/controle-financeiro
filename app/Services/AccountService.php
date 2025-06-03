<?php

namespace App\Services;

use App\Models\Account;
use Illuminate\Support\Str;

class AccountService
{
    public function show(array $params): array
    {
        return Account::all()->toArray();
    }

    public function create(array $params): Account
    {
        $params['id'] = (string) Str::uuid();

        return Account::create($params);
    }

    public function update(array $params): Account
    {
        $params['id'] = (string) Str::uuid();

        return Account::create($params);
    }
}
