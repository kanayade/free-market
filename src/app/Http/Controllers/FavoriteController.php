<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    public function store(Item $item)
    {
        Favorite::firstOrCreate([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
        ]);

        return back();
    }

    public function destroy(Item $item)
    {
        Favorite::where('user_id', Auth::id())
            ->where('item_id', $item->id)
            ->delete();

        return back();
    }
}
