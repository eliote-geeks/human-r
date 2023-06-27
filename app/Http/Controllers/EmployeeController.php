<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\TeamUser;
use App\Models\ChiefTeam;
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
        $teams = Team::orderByDesc('created_at')->paginate(10);
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

    public function teamUser(Request $request,$id)
    {
        $team = Team::findOrFail($id);
        $request->validate([
            'users' => 'required|array',
            'users.*' => 'integer'
        ]);
        
        foreach($request->users as $u)
        {
            $tU = new TeamUser();
            $tU->user_id = $u;
            $tU->team_id = $team->id;
            $tU->save();
        }
        return redirect()->back()->with('message','Users associate successfully !!');
    }

    public function removeTeamUser($id)
    {
        $tu = TeamUser::findOrFail($id);
        if(ChiefTeam::where('team_id',$tu->team_id)->count() > 0)
        {
            $c = ChiefTeam::where('team_id',$tu->team_id)->firstOrFail();
            $c->delete();
        }
        $tu->delete();
        
        return redirect()->back()->with('message','Success!');
    }

    public function chefUnity(Request $request, $id)
    {
        $request->validate([
            'user' => 'required|integer'
        ]);
        $team = Team::findOrFail($id);
        // $c = ChiefTeam::find
        if(ChiefTeam::where('team_id',$team->id)->count() > 0)
        {
            $c = ChiefTeam::where('team_id',$team->id)->firstOrFail();
            $c->user_id = $request->user;
            $c->save();
        }
        else{
            $c = new ChiefTeam();
            $c->user_id = $request->user;
            $c->team_id = $team->id;
            $c->save();
        }

        return redirect()->back()->with('message','Success!');

    }
}
