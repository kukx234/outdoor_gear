<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showList()
    {
        $users = User::where('id','!=',Auth::user()->id)->get();
        return view("Admin.users.user-list")->with("users",$users);
    }

    public function userBlock(Request $request)
    {
        User::where('id', $request->id)->update([
            'block' => $request->block,
        ]);

        return redirect()->back()->with("Success", "korisnik blokiran");
    }
}
