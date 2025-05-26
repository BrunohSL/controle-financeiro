<?php

namespace App\Services;

use App\Models\Account;

class AccountService
{
    public function showUsers(array $params): array
    {
        return Account::all()->toArray();
    }

    public function createUser(array $params): Account
    {
        return Account::create($params);
    }
}
