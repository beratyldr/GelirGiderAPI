<?php

namespace App\Http\Controllers;

use App\Model\Expense;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index(){
        $response = Expense::orderBy('created_at')->get();
        return response()->json(['success' => true, 'success' =>$response]);
    }

    public function store(Request $request){
        $amount      =  $request->amount;
        $currency_id =  $request->currency_id;
        $description =  $request->description;
        $expense_id  =  $request->expense_id;

        $expenses  = Expense::create([
             'amount' => $amount,
             'currency_id' => $currency_id, 
             'description' => $description,
             'expense_id'=>$expense_id
            ]);
        
        return response()->json(['success' => true, 'success' =>"You have successfuly added the new expenses"]);

    }

    public function update(Request $request,$id){

       $res= Expense::where('id',$id)->update([
            'amount' => $request->amount,
            'currency_id' => $request->currency_id,
            'description' => $request->description,
            'expense_id' => $request->expense_id,
        ]);

        return response()->json(['success' => true, 'success' =>$res]);
    }
    public function destroy($id){
        Expense::where('id',$id)->delete();
        return response()->json(['success' => true, 'success' =>"You have successfuly delete"]);
    }
   
}
