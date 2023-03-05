<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasteController extends Controller
{
    public function getPastes(Request $request){

        $user = Auth::user();

        $pastes = Paste::query()
            ->with('subpastes')
            ->where('user_id', $user->id)->get();

        return response()->json($pastes);
    }
}
