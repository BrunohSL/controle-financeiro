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

    public function create(Request $request)
    {
        $params = $request->all();

        $account = $this->accountService->createUser($params);

        return response()->json([
            'message' => 'Account created successfully',
            'account' => $account
        ])->setStatusCode(201, 'Created');
    }
}
