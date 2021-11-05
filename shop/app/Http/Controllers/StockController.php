<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use App\Models\stock;
use App\Models\invoice;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = product::paginate(10);
        return view('dashboard.stock.ViewStock',compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $products = product::all();
        return view('dashboard.stock.AddStock',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = product::find($request->product_id);
        $newqty = (int) $product->quantity + (int) $request->quantity;
        $product->quantity = $newqty;
        $product->save();
        $stock = new stock;
        $stock->product_name = $request->product_name;
        $stock->quantity= $request->quantity;
        $stock->net_amount = (int) $request->price * (int) $request->quantity  ;
        $stock->save();
        return redirect()->back()->with('success','Stock Updated Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
       
        foreach ($request->all()[0] as $key => $value) {
            $product = product::find($value['id']);
            $product->quantity =(int) $product->quantity - (int)$value['quantity'];
            $product->save();
        }
        $invoiceData = $request->all()[1];
        $invoice = new invoice();
        $invoice->invoice_no = $invoiceData['invoice_no'];
        $invoice->items = '';
        $invoice->amount = $invoiceData['amount'];
        $invoice->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
