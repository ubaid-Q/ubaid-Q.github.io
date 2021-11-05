<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        return view('dashboard.products.ViewAllProducts',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('dashboard.products.AddProduct',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'productname'=>'required',
            'productprice'=>'required',
            'category'=>'required',
            'productimg'=>'required'
        ]);

        $imageName = time().'.'.$request->productimg->extension();  
     
        $request->productimg->move(public_path('images'), $imageName);

        $product = new product;
        $product->product_name = $request->productname;
        $product->price = $request->productprice;
        $product->product_img = $imageName;
        $product->category_id = $request->category;
        $product->quantity = 0;
        $save =  $product->save();
        if ($save) {
            return redirect()->back()->with('success',"<strong> <i class='fas fa-check '></i> ".$product->product_name."</strong> Added Successfully!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = product::find($id);
        $categories = category::all();

        return view('dashboard.products.ViewProduct',compact('product','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = product::find($id);
        $product->product_name = $request->productname;
        $product->price = $request->productprice;
        $product->category = $request->category;
        if($request->hasFile('productimg')){
            $imgpath = $request->file('productimg')->store('images');
            $product->product_img = $imgpath;
        }
        $save =  $product->save();
        if ($save) {    
            return redirect('/products')->with('success', '<strong>'.$product->product_name.'</strong> updated Successfully !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $prod =  product::find($id);
        $res = $prod->delete();
       if ($res) {
           return redirect('/products')->with('success','<b>'. $prod->product_name.'</b> Deleted !');
       }
    }
}
