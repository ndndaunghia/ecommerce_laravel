<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    public function product_details($id) {
        $product = Product::find($id);
        
        return view('home.product_details', compact('product'));
    }
}
