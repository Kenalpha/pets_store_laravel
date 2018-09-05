<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use App\Product;
use App\Order_item;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Auth;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	$colors = Color::all();
    	return view('site.home', ['products' => $products,
                                  'colors' => $colors
    		                     ]);
    }

    public function color()
    {
    	return view('site.color');
    }

    public function addColor(Request $request)
    {
       $this->validate($request, [
            'color_name' => 'required'
       ]);
       $color = new Color;
	   $color->color_name = $request->input('color_name');
	   $color->save();
	   return redirect('/home')->with('status', 'Color Added successfully');
    }

    public function product()
    {
    	return view('site.product');
    }

    public function addProduct(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4000',
            'description' => 'required',
            'cost' => 'required',
        ]);
        if (Input::hasFile('product_image')) {
        	$file = Input::file('product_image');
        	$file->move(public_path().'/uploads', $file->getClientOriginalName());
        	$url = URL::to('/').'/uploads/'.$file->getClientOriginalName();
        }
        $product = new Product;
	    $product->product_name = $request->input('product_name');
	    $product->product_image = $url;
	    $product->description = $request->input('description');
	    $product->cost = $request->input('cost');
	    $product->save();
	    return redirect('/home')->with('status', 'Product Added successfully');
    }

    public function addCart(Request $request)
    {
    	$this->validate($request, [
            'color_id' => 'required',
            'product_id' => 'required',
        ]);
        $added_product =new Order_item;
        $current_user_id = Auth::user()->id;
        $product_id = $request->input('product_id');
        $check_customer = Order_item::where(['customer_id' => $current_user_id, 'product_id' => $product_id])->first();
        if(empty($check_customer))
        {
        	$added_product->customer_id = $current_user_id;
	        $added_product->color_id = $request->input('color_id');
	        $added_product->product_id = $product_id;
	        $added_product->quantity = 1; //default quanity
	        $added_product->save();
	        return redirect('/home')->with('status', 'Added To Cart successfully');
        }
        else
        {
            return redirect('/home')->with('status_s', 'Already added to Cart');
        }
        
        
    }

    public function cart()
    {
    	$current_user_id = Auth::user()->id;
    	$cart_items = DB::table('order_items')
    	         ->join('products', 'order_items.product_id', '=', 'products.id')
    	         ->select('order_items.*', 'products.*')
    	         ->where(['order_items.customer_id' => $current_user_id])
    	         ->get();
    	return view('site.cart', ['cart_items' => $cart_items]);
    }

    public function pending()
    {
    	$current_user_id = Auth::user()->id;
    	$pending = DB::table('customers')
    	         ->join('order_items', 'customers.id', '=', 'order_items.customer_id')
    	         ->join('products', 'products.id', '=', 'order_items.product_id')
    	         ->select('customers.*', 'order_items.*', 'products.*')
    	         ->where(['customers.id' => $current_user_id])
    	         ->get();
    	return view('site.pending', ['pending' => $pending]);
    }

    public function edit(Request $request, $id)
    {
    	$this->validate($request, [
            'quantity' => 'required',
        ]);
        $data = array(
            'quantity' => $request->input('quantity')
    	);
        Order_item::where('o_id', $id)->update($data);
        return redirect('/cart')->with('status', 'Saved Successfully');
    }

    public function delete($id)
    {
    	Order_item::where('o_id', $id)->delete();
        return redirect('/cart')->with('status', 'Deleted successfully');
    }
}
