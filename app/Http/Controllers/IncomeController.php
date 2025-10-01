<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\KillAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Services\AccountService;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * @var AccountService
     */
    private $accountService;

    public function __construct()
    {
        $this->accountService = new AccountService();
    }

    /**
     * Lista as contas bancárias
     *
     * @method: GET
     * @link: api/accounts/show-accounts
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $params = $request->all();

        $accounts = $this->accountService->show($params);

        return response()->json($accounts);
    }

    /**
     * Cria uma nova conta bancária
     *
     * @method: POST
     * @link: api/accounts/create-account
     *
     * @param CreateAccountRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateAccountRequest $request)
    {
        $params = $request->all();

        $account = $this->accountService->create($params);

        return response()->json([
            'status' => 'success',
            'message' => 'Account created successfully',
            'account' => $account
        ])->setStatusCode(201, 'Created');
    }

    /**
     * Editar uma conta bancária
     *
     * @method: PUT
     * @link: api/accounts/update-account
     *
     * @param UpdateAccountRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request)
    {
        $params = $request->all();

        $account = $this->accountService->update($params);

        return response()->json([
            'status' => 'success',
            'message' => 'Account updated successfully',
            'account' => $account
        ])->setStatusCode(201, 'Created');
    }

    /**
     * Deleta uma conta bancária
     *
     * @method: DELETE
     * @link: api/accounts/delete-account
     *
     * @param KillAccountRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function kill(KillAccountRequest $request)
    {
        $params = $request->all();

        $account = $this->accountService->kill($params['id']);

        return response()->json([
            'status' => 'success',
            'message' => 'Account deleted successfully',
            'account' => $account
        ])->setStatusCode(200, 'OK');
    }
}
