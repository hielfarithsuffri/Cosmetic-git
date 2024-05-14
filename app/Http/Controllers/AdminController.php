<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use LDAP\Result;

class AdminController extends Controller
{
    public function index()
    {
        return view('/admin.home');
    }
    public function view_category()
    {
        $data=Category::all();
        return view('admin.category',compact('data'));
    }

    public function view_product()
    {
        $category = category::all();
        return view('admin.product', compact ('category'));
    }
    public function show_product()
    {
        $product = products::all();
        return view('admin.show_product', compact('product'));
    }

    public function add_category(Request $request)
    {
        $data = new Category; // Assuming your model is named "Category" and follows Laravel's naming conventions
        $data->category_name = $request->input('category');
        $data->save();
        
        // Redirecting back to the "view_category" route
        return redirect('/view_category')->with('message', 'Category Added');
    }
    
    
    

    public function add_product(Request $request)
    {
        $product = new Products; // Assuming your model is named "Category" and follows Laravel's naming conventions
        $product->title = $request->input('producttitle');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->discount_price = $request->input('dis_price');
        $product->quantity = $request->input('quantity');
        $product->category = $request->input('category');

        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;
        
        $product->save();
        return redirect()->back()->with('message','Product Added');
    }


    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted');
    }

    public function delete_product($id)
    {
        $data = Products::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product Deleted');
    }


    public function update_product($id)
    {
        $product = Products::find($id);
        $category = Category::all();
        return view('admin.update_product', compact('product', 'category'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product = Products::find($id); // Assuming your model is named "Category" and follows Laravel's naming conventions
        $product->title = $request->producttitle;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $image = $request->file('image');
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }
        
        $product->save();
        return redirect()->back()->with('message','Product Updated');
    }
        
}


    