<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;

class VerifyMailController extends Controller
{
    public function verify(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->email_verified_at = Carbon::now()->toDateTimeString();
        $user->save();
        return redirect('/')->with('verified', true);
    }
}
