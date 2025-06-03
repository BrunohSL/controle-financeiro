<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
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
     * @param \App\Http\Requests\CreateAccountRequest $request
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
}
