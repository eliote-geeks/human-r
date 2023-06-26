<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = DB::table('users')
        ->leftJoin('employes','employes.user_id','users.id')
        ->selectRaw('users.*')
        ->orderByDesc('users.created_at')
        ->get();
        
        // dd($employees);
        return view('employees.employee-list',compact('employees'));
    }


    public function add_employee()
    {
        return view('employees.add-employee');
    }

    public function employeeTeams()
    {
        $teams = Team::orderByDesc('created_at')->get();
        $users = DB::table('users')
        ->leftJoin('employes','employes.user_id','users.id')
        ->selectRaw('users.*')
        ->orderByDesc('users.created_at')
        ->get();
        return view('employees.employee-team',compact('teams','users'));
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

    public function deleteTeam($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->back()->with('message','deleting success !!');
    }

    public function editTeam(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'string'
        ]);

        $team = Team::findOrFail($id);
        $team->name = $request->name;
        $team->description = $request->description;
        $team->save();
        return redirect()->back()->with('message','Success !!');
    }
}
