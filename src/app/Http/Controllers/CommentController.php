<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Product;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $item_id)
    {
        if (!Auth::check()) {
            return redirect()->guest('/login');
        }
        Comment::create([
            'user_id'    => Auth::id(),
            'product_id' => $item_id,
            'comment'    => $request->comment,
        ]);
        return redirect()->back();
    }
}
