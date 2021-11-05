<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Expense;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products  = product::all();
        $expenses = Expense::orderBy('created_at', 'desc')->paginate(2);
        return view('main',compact('products','expenses'));
    }

    public function getProduct($id){
        $product =product::find($id);
        return $product;
    }


    public function addExpense(Request $request)
    {
        $expense = new Expense();
        $expense->desc = $request->desc;
        $expense->amount =$request->amount;
        $expense->save();
        return redirect()->back()->with('msg','Added');
    }

    public function deleteExpense(Request $request, $id)
    {
        Expense::find($id)->delete();
        return redirect()->back();
    }
}
