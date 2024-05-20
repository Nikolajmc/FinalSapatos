<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Wishlist;

class AppController extends Controller
{
    public function index()
    {
        $product = product::paginate(12);
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id', $userid)->count();
            $counts = wishlist::where('user_id', $userid)->count();
        }
        else
        {
            $count = '0';
            $counts = '0';
        }

        return view('index', compact('product', 'count', 'counts'));
    }

    public function productDetail($id)
    {
        $product=product::find($id);
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id', $userid)->count();
            $counts = wishlist::where('user_id', $userid)->count();
        }
        else
        {
            $count = '0';
            $counts = '0';
        }

        return view('user.product_detail', compact('product', 'count', 'counts'));
    }

    public function addCart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $product=product::find($id);
            $product_exist_id=cart::where('product_id', '=', $id)->where('user_id', '=', $userid)->get('id')->first();

            if($product_exist_id)
            {
                $cart=cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity=$quantity + $request->quantity;

                $cart->save();

                return redirect()->back();
            }
            else
            {
                $cart=new cart;
                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;
    
                $cart->product_title=$product->title;
                $cart->price=$product->price;
                $cart->image=$product->image;
                $cart->product_id=$product->id;
                $cart->quantity=$request->quantity;
    
                $cart->save();
    
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function showCart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=cart::where('user_id', '=', $id)->get();
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id', $userid)->count();
            $counts = wishlist::where('user_id', $userid)->count();
    
            return view('user.show_cart', compact('cart', 'count', 'counts'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function removeCart($id)
    {
        $cart=cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    public function cashOrder(Request $request)
    {
        $user=Auth::user();
        

        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $phone = $request->phone;
        $userid=$user->id;
        $data = cart::where('user_id', $userid)->get();

        foreach($data as $data)
        {
            $order = new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->address=$data->address;
            $order->phone=$data->phone;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->payment_status='Cash on Delivery';
            $order->delivery_status='Processing';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
        return redirect('thankyou');
    }

    public function thankyou(Request $request)
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $order=order::where('user_id', '=', $id)->get();
            $user=Auth::user();
            $userid=$user->id;
            $count=cart::where('user_id', $userid)->count();
            $counts=wishlist::where('user_id', $userid)->count();

        }
        else
        {
            $count='0';
            $counts='0';
        }
        return view('user.thankyou', compact('count', 'order', 'counts'));
    }

    public function aboutUs()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id', $userid)->count();
            $counts = wishlist::where('user_id', $userid)->count();
        }
        else
        {
            $count = '0';
            $counts='0';
        }

        return view('user.aboutus', compact('count', 'counts'));
    }

    public function contactUs()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id', $userid)->count();
            $counts = wishlist::where('user_id', $userid)->count();
        }
        else
        {
            $count = '0';
            $counts='0';
        }

        return view('user.contact_us', compact('count', 'counts'));
    }

    public function shop()
    {
        $product = product::paginate(12);
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id', $userid)->count();
            $counts = wishlist::where('user_id', $userid)->count();
        }
        else
        {
            $count = '0';
            $counts='0';
        }

        return view('user.shop', compact('product', 'count', 'counts'));
    }

    public function addWishlist(Request $request, $id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $product=product::find($id);

            $wishlist=new wishlist;
            $wishlist->name=$user->name;
            $wishlist->email=$user->email;
            $wishlist->phone=$user->phone;
            $wishlist->address=$user->address;
            $wishlist->user_id=$user->id;
            
            $wishlist->product_title=$product->title;
            $wishlist->price=$product->price;
            $wishlist->image=$product->image;
            $wishlist->product_id=$product->id;
            $wishlist->quantity=$request->quantity;

            $wishlist->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }
        
    public function showWishlist()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $wishlist=wishlist::where('user_id', '=', $id)->get();
            $user = Auth::user();
            $userid = $user->id;
            $count = cart::where('user_id', $userid)->count();
            $counts = wishlist::where('user_id', $userid)->count();
        }
        else
        {
            $count = '0';
            $counts='0';

            return redirect('login');
        }

        return view('user.wishlist', compact('wishlist', 'count', 'counts'));
    }

    public function removeWishlist($id)
    {
        $wishlist=wishlist::find($id);
        $wishlist->delete();

        return redirect()->back();
    }

    public function removeAll()
    {
        Cart::truncate();

        return redirect()->back();
    }

    public function searchData(Request $request)
    {
        $searchText = $request->search;
        $product = Product::where('title', 'LIKE', "%$searchText%")->paginate(12);

        $user = Auth::user();
        
        // Initialize counts
        $count = 0;
        $counts = 0;
        
        if ($user) {
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $counts = Wishlist::where('user_id', $userid)->count();
        }

        return view('user.shop', compact('product', 'counts', 'count'));
    }
}