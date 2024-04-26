<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MyFirstNotification;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view("admin.category", compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new Category();

        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with("success", "Category added successfully");
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        return redirect()->back()->with("success", "Category deleted successfully");
    }

    public function view_product()
    {
        $category = Category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;
        $product->image = $request->image;

        // $image = $request->image;
        // $imagename = time() . '.' . $image->getClientOriginalExtension();
        // $request->image->move('product', $imagename);
        // $product->image = $imagename;

        $product->save();
        return redirect()->back()->with("success", "Product added successfully");
    }

    public function show_product()
    {
        $product = Product::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with("success", "Product deleted successfully");
    }

    public function update_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();

        return view('admin.update_product', compact('product', 'category'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;

        $product->image = $request->image;


        $product->save();

        return redirect()->back()->with("success", "Product updated successfully");
    }

    public function order()
    {
        $order = Order::all();
        return view('admin.order', compact('order'));
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "Delivered";
        $order->payment_status = "Paid";

        $order->save();
        return redirect()->back()->with("success", "Order delivered successfully");
    }

    public function search_data(Request $request)
    {
        $search = $request->search;

        $order = Order::where('name', 'LIKE', '%' . $search . '%')->orWhere('phone', 'LIKE', '%' . $search . '%')->get();

        return view('admin.order', compact('order'));
    }

    public function send_email($id)
    {
        $order = Order::find($id);
        return view('admin.email_info', compact('order'));
    }

    public function send_user_email(Request $request, $id)
    {
        $order = Order::find($id);
        $details = [
            'greeting' => $request->greeting,
            'first' => $request->first,
            'body' => $request->body,
            'last' => $request->last
        ];

        Notification::send($order, new MyFirstNotification($details));

        return redirect()->back();
    }
}
