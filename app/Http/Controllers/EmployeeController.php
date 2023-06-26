<?php

namespace App\Http\Controllers;

use App\Models\Team;
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

    public function employeeTeams()
    {
        $teams = Team::orderByDesc('created_at')->get();
        return view('employees.employee-team',compact('teams'));
    }

    public function createTeam(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|string|unique:teams',
            'description' => 'string'
        ]);

        $team = new Team();
        $team->name = $request->name;
        if(isset($request->description))
            $team->description = $request->description;
        $team->save();

        return redirect()->back()->with('message','success');
    }    
}
