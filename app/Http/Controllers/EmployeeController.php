<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
class EmployeeController extends Controller
{
    public function create(){
        return view('admin.employee.create');
    }
    public function store(Request $request)
    {
         $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'expiredID'=>'required',
            'numberID'=>'required|unique:employees',
        ]);

      $employee=  Employee::create($request->all());
    
     
       return redirect()->back()->with("success", "تمت الاضافة بنجاح");

    }
}
