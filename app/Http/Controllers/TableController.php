<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
class TableController extends Controller
{
    public function create()
    {
        return view('admin.table.create');
    }
    public function index(){
        $tables=Table::all();
        return view('admin.table.index',compact('tables'));
    }
}
