<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function create(Request $request)
    {
        $token = $request->user()->createToken('authToken')->plainTextToken;
        return response()->json(['token' => $token], 200);
    }

    public function destroy(Request $request, $id)
    {
        $request->user()->tokens()->where('id', $id)->delete();
        return response()->json(['message' => 'Token deleted'], 200);
    }
}
