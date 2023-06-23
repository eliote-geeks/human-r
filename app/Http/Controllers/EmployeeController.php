<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = DB::table('users')
        ->leftJoin('employes','employes.user_id','users.id')
        ->select('users.*')
        ->orderByDesc('users.created_at')
        ->get();
        return view('employees.employe-office');
    }


    public function add_employee()
    {
        return view('employees.add-employee');
    }
}
