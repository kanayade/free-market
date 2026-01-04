<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('mypage', compact('user'));
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('users', 'public');
        }
        $user->update;
        return redirect('/');
    }
}