<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $expenses = Expense::query()->orderBy('date')->get();
        return view('expenses', ['expenses'=>$expenses]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'date' => 'required',
            'value' => 'required',
            'reason' => 'required'
        ]);

        $expense = new Expense();
        $expense->date = $request->input('date');
        $expense->value = $request->input('value');
        $expense->reason = $request->input('reason');
        $expense->save();

        session()->flash('message', 'Expense added to Expenses list');

        return redirect()->back();
    }

}
