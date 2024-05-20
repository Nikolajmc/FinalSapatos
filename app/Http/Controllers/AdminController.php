<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $orders=order::paginate(5);
        $total_product=product::all()->count();
        $total_order=order::all()->count();

        $order=order::all();
        $total_revenue=0;
        foreach($order as $order)
        {
            $total_revenue=$total_revenue + $order->price;
        }

        return view('admin.index', compact('orders', 'total_product', 'total_order', 'total_revenue'));
    }

    public function viewCategory()
    {
        $data=category::all();

        return view('admin.category', compact('data'));
    }

    public function addCategory(Request $request)
    {
        $data=new category;
        $data->category_name=$request->category;
        $data->save();

        return redirect()->back();
    }

    public function deleteCategory($id)
    {
        $data=category::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function viewProduct()
    {
        $category=category::all();

        return view('admin.product', compact('category'));
    }

    public function addProduct(Request $request)
    {
        $product=new product;

        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->quantity=$request->quantity;
        $product->category=$request->category;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage', $imagename);
        $product->image=$imagename;

        $product->save();

        return redirect()->back();
    }

    public function showProduct()
    {
        $product = product::paginate(9);

        return view('admin.show_product', compact('product'));
    }

    public function showAllProduct()
    {
        $product = product::all();

        return view('admin.show_all_product', compact('product'));
    }

    public function deleteProduct($id)
    {
        $product=product::find($id);
        $product->delete();

        return redirect()->back();
    }

    public function updateProduct($id)
    {
        $product=product::find($id);
        $category=category::all();

        return view('admin.update_product', compact('product', 'category'));
    }

    public function updateProductConfirm(Request $request, $id)
    {
        $product=product::find($id);

        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->quantity=$request->quantity;
        $product->category=$request->category;

        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('productimage', $imagename);
            $product->image=$imagename;
        }
        
        $product->save();

        return redirect('/show_product');
    }

    public function shippedOut($id)
    {
        $order=order::find($id);
        $order->delivery_status="Shipped Out";

        $order->save();

        return redirect()->back();
    }

    public function delivered($id)
    {
        $order=order::find($id);
        $order->delivery_status="Delivered";
        $order->payment_status='Paid';

        $order->save();

        return redirect()->back();
    }

    public function orders()
    {
        $orders=order::all();
        $total_product=product::all()->count();
        $total_order=order::all()->count();

        $order=order::all();
        $total_revenue=0;
        foreach($order as $order)
        {
            $total_revenue=$total_revenue + $order->price;
        }

        return view('admin.orders', compact('orders', 'total_product', 'total_order', 'total_revenue'));
    }
}