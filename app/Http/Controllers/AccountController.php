<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function show(Request $request)
    {
        // Get the authenticated user
        $user = $request->user();

        // Return the user data as a JSON response
        return response()->json($user);
    }

    public function create(Request $request)
    {
        // Logic to create a new account
        // This is just a placeholder for the actual implementation
        return response()->json(['message' => 'Account created successfully']);
    }
}
