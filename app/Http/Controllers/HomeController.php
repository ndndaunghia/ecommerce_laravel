<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);

        return view('home.userpage', compact('products'));
    }

    public function redirect()
    {
        $usertype  = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $products = Product::limit(6)->get();
            return view('home.userpage', compact('products'));
        }
    }

    public function product_details($id)
    {
        $product = Product::find($id);

        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = Cart::where('user_id', $user->id)
                ->where('product_id', $product->id)
                ->first();

            if ($cart) {
                $cart->quantity += $request->quantity;
                if ($product->discount_price != null) {
                    $cart->total_price = $product->discount_price * $cart->quantity;
                } else {
                    $cart->total_price = $product->price * $cart->quantity;
                }
                $cart->save();
            } else {
                $cart = new Cart;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;
                $cart->product_title = $product->title;
                
                $cart->image = $product->image;
                $cart->product_id = $product->id;
                $cart->quantity = $request->quantity;
                if ($product->discount_price != null) {
                    $cart->price_per_one = $product->discount_price;
                    $cart->total_price = $product->discount_price * $request->quantity;
                } else {
                    $cart->total_price = $product->price * $request->quantity;
                    $cart->price_per_one = $product->price;
                }
                $cart->save();
            }

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            $productCount = $cart->count();

            $subTotal = $cart->sum('total_price');
            session(['subTotal' => $subTotal]);

            return view('home.show_cart', compact('cart', 'productCount', 'subTotal'));
        } else {
            return redirect('login');
        }
    }

    public function remove_product_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->back()->with("success", "Product removed successfully");
    }

    public function update_cart(Request $request, $id)
    {
        $cart = Cart::find($id);
        if (!$cart) {
            return redirect()->back()->with("error", "Cart not found");
        }

        $quantity = $request->input('quantity');
        if (!$quantity || $quantity < 1) {
            return redirect()->back()->with("error", "Invalid quantity");
        }

        $cart->quantity = $quantity;
        $cart->total_price = $cart->price_per_one * $cart->quantity;
        $cart->save();
        return redirect()->back()->with("success", "Cart updated successfully");
    }
}
