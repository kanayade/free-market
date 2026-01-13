<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page','sell');
        $user = Auth::user();

        $sellItems = Product::where('user_id',$user->id)->get();

        $buyItems = Product::whereHas('orders',function ($query) use ($user) {
            $query->where('user_id',$user->id);
        })->get();

        return view('mypage', compact('user','page','sellItems','buyItems'));
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
    public function edit()
    {
        $user = Auth::user();
        return view('mypage_edit', compact('user'));
    }
}