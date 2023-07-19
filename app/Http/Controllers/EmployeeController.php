<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Team;
use App\Models\User;
use App\Models\Week;
use App\Models\Employe;
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
        ->paginate(5);
        
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

    //Ajouter ou modifier un chef d'unite
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

    //employee sous forme de grid
    public function employeeGrid()
    {
        $employees = DB::table('users')
        ->leftJoin('employes','employes.user_id','users.id')
        ->selectRaw('users.*')
        ->orderByDesc('users.created_at')
        ->paginate(3);
        
        return view('employees.employee-grid',compact('employees'));
    }

    //Modifier le status d''un employee
    public function employeeStatus($id)
    {
        $employee = User::findOrFail($id);
        if($employee->profile == 'active')
            $employee->profile = 'none';
        else
            $employee->profile = 'active';

        $employee->save();
        return redirect()->back()->with('message','Success');
    }

    public function profile($id)
    {
        try{
            if(DB::table('users')
            ->leftJoin('employes','employes.user_id','=','users.id')
            ->selectRaw('users.*, employes.job as job')
            ->where('users.id','=',$id)
            ->where('employes.user_id',$id)
            ->take(1)
            ->count() > 0){
                    $user = DB::table('users')
                    ->leftJoin('employes','employes.user_id','=','users.id')
                    ->selectRaw('users.*, employes.job as job, employes.type as type')
                    ->where('users.id','=',$id)
                    ->where('employes.user_id',$id)
                    ->take(1)
                    ->first();
                    $teams = Team::latest('created_at')->get();
                    return view('user-profile.profile',compact('user','teams'));
            }
            dd('Error: Oups Something wrong!');

        }
        catch(Exception $e)
        {
            dd('Error:  '.$e->getMessage());
        }        
    }

    public function changeTeamUser(Request $request, $id)
    {
        $request->validate([
            'team' => 'required|integer'
        ]);
        $user = User::findOrFail($id);
        $tU = TeamUser::where('team_id',$request->team)->count() > 0 ? TeamUser::where('team_id',$request->team)->firstOrFail() : new TeamUser();
        $tU->user_id = $user->id;
        $tU->team_id = $request->team;
        $tU->save();
        return redirect()->back()->with('message','saved!!');
    }

    public function positionEdit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'job' => 'required|string',
            'type' => 'required|string',
            'frequency' => 'required|string'
        ]);

        $e =  Employe::where('user_id',$user->id)->firstOrFail();
        $e->job = $request->job;
        $e->type = $request->type;
        $e->save();

        $user->frequency = $request->frequency;
        $user->save();

        return redirect()->back()->with('message','Saved!');
    }


    public function weekEdit($id,$user)
    {
        $tab = array(1,2,3,4,5,6,7);
        if(!in_array($id,$tab))
        {
            return redirect()->back()->with('message','Day not Know!');
        }
        if(Week::where([
            'day' => $id,
            'user_id' => User::findOrFail($user)->id
            ])->count() == 0)
            {
                $week = new Week();
                $week->day = $id;
                $week->user_id = User::findOrFail($user)->id;
                $week->status = 1;
                $week->save();
                return redirect()->back()->with('message','saved!!');
            }
            else{
                $week = Week::where([
                    'day' => $id,
                    'user_id' => User::findOrFail($user)->id
                    ])->firstOrFail();
                    
                    if($week->status == 0)
                        $week->status = 1;
                    else
                        $week->status = 0;

                    $week->save();
                    return redirect()->back()->with('message','saved!!');
            }
    }
}
