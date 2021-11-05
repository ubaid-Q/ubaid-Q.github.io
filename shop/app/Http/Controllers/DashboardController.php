<?php

namespace App\Http\Controllers;

use App\Models\stock;
use App\Models\invoice;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $todaySale = invoice::whereDate('created_at', date('Y-m-d'))->sum('amount');
        $currentMonthSale = invoice::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('amount');
        $expenseToday = Expense::whereDate('created_at', date('Y-m-d'))->sum('amount');

        return view('dashboard.dashboard',compact('todaySale','currentMonthSale','expenseToday'));
    }
    
    public function viewHistory(Request $request)
    {
        if ($request->date) {
            $stocks = DB::table('stocks')->whereDate('created_at', $request->date)->get();
        }else{
            $stocks = stock::paginate(10);
        }
        return view('dashboard.history',compact('stocks'));
    }

    public function viewActivity(Request $request)
    {
        
    }
}
