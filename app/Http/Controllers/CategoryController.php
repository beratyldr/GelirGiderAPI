<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
            
    }
    public function store(Request $request){
        $name         =  $request->name;
        $expense_type =  $request->expense_type;
        $user_id      =  $request->user_id;

        $category  = Category::create([
             'name'         => $name,
             'expense_type' => $expense_type, 
             'user_id'      => $user_id,
            ]);
        
        return response()->json(['success' => true, 'success' =>"You have successfuly added the new category",$category]);

    }

}
