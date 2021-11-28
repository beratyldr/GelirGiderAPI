<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index(){
        echo "asd";
    }

    public function store(Request $request){
        $amount = $request->amount;
        $currency_id    = $request->currency;
        $description = $request->description;
        $expense_id=$request->expense_id;
        $expenses     = Expense::create(['amount' => $amount, 'currency_id' => $currency_id, 'description' => $description,'expense_id'=>$expense_id]);
        
        return response()->json(['success' => true, 'success' =>"You have successfuly added the new expenses"]);

    }
}
