<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasteController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse
     * return the pastes with the subpastes only of the user logged
     */
    public function getPastes(Request $request){

        $user = Auth::user();

        $pastes = Paste::query()
            ->with('subpastes')
            ->where('user_id', $user->id)->get();

        return response()->json($pastes);
    }

}
