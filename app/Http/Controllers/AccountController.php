<?php

namespace App\Http\Controllers;

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

    public function show(Request $request)
    {
        $params = $request->all();

        $accounts = $this->accountService->showUsers($params);

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
