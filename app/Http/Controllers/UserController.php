<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Wishlist;

class UserController extends Controller
{
    public function index(User $user, Order $orders, Wishlist $wishlists)
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $orders=Order::where('user_id', '=', $id)->get();
            $wishlists=Wishlist::where('user_id', '=', $id)->get();

            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id', $userid)->count();
            $counts = wishlist::where('user_id', $userid)->count();
        }
        else
        {
            $count='0';
            $counts='0';
        }

        return view('user.index', compact('count', 'user', 'orders', 'counts', 'wishlists'));
    }
}