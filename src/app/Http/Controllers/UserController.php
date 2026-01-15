<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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
    public function update(Request $request)
    {
        $user = Auth::user();
        $data = [
        'name' => $request->input('name'),
        'postal_code' => $request->input('postal_code'),
        'address' => $request->input('address'),
        'building' => $request->input('building'),
        ];
        if ($request->hasFile('user_image')) {
            if ($user->user_image) {
            Storage::disk('public')->delete($user->user_image);
        }
        $data['user_image'] = $request
            ->file('user_image')
            ->store('users', 'public');
        }
        $user->update($data);
        return redirect('/');
    }
    public function edit()
    {
        $user = Auth::user();
        return view('mypage_edit', compact('user'));
    }
}