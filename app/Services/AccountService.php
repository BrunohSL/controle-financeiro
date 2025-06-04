<?php

namespace App\Services;

use App\Models\Account;
use Illuminate\Support\Str;

class AccountService
{
    /**
     * Lista as contas bancárias
     *
     * @param array $params
     *
     * @return array
     */
    public function show(array $params): array
    {
        return Account::all()->toArray();
    }

    /**
     * Cria uma nova conta bancária
     *
     * @param array $params
     *
     * @return Account
     */
    public function create(array $params): Account
    {
        $params['id'] = (string) Str::uuid();

        return Account::create($params);
    }

    /**
     * Atualiza uma conta bancária existente
     *
     * @param array $params
     *
     * @return Account
     */
    public function update(array $params): Account
    {
        $account = Account::findOrFail($params['id']);
        $account->update($params);

        return $account;
    }

    /**
     * Deleta uma conta bancária
     *
     * @param string $id
     *
     * @return bool
     */
    public function kill(string $id): bool
    {
        $account = Account::findOrFail($id);

        return $account->delete();
    }
}
