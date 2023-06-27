@extends('layout.app')
@section('content')

@include('header.header')
@include('header.sidebar')



<div class="page-wrapper">
<div class="content container-fluid">
<div class="row">
<div class="col-xl-12 col-sm-12 col-12 mb-4">
<div class="breadcrumb-path ">
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html"><img src="assets/img/dash.png" class="mr-2" alt="breadcrumb" />Home</a>
</li>
<li class="breadcrumb-item active"> Employees</li>
</ul>
<h3>Employees</h3>
</div>
</div>
<div class="col-xl-12 col-sm-12 col-12 mb-4">
<div class="head-link-set">
<ul>
<li><a href="{{route('employees')}}">All</a></li>
<li><a class="active" href="jvascript:;">Teams</a></li>
<li><a href="employee-office.html">Offices</a></li>
</ul>
<a class="btn-sm btn-success" data-toggle="modal" data-target="#addteam"><i data-feather="plus"></i> Create Team</a>
</div>
</div>
<div class="col-xl-12 col-sm-12 col-12 ">
<div class="card m-0">
<div class="card">
<div class="row">
@forelse($teams as $t)

<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <div class="employee-head">
                <h2>{{\Str::title($t->name)}} </h2>
                <p class="title">Supervisor: {{\App\Models\Team::chief($t->id)}}</p>
                <ul>
                    <li><a class="edit_employee" data-toggle="modal" data-target="#edit{{$t->id}}"><i data-feather="edit"></i></a></li>
                    <li><a class="edit_delete" data-toggle="modal" data-target="#delete{{$t->id}}"><i data-feather="trash-2"></i></a></li> 
                    <li><a class="edit_delete" data-toggle="modal" data-target="#team{{$t->id}}"><i data-feather="plus"></i></a></li>
                    <li><a class="edit_delete" data-toggle="modal" data-target="#teamChef{{$t->id}}"><i data-feather="user-plus"></i></a></li>
                    <li><a class="edit_employee"  data-toggle="modal" data-target="#info{{$t->id}}"><i data-feather="info"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="card-body">
            <div class="employee-content">
                <div class="employee-image">
                    <div class="avatar-group">
                        @forelse(\App\Models\TeamUser::where([
                            'team_id' => $t->id,
                            ])->get() as $tu)
                            <div class="avatar avatar-xs group_img group_header">
                                <img class="avatar-img rounded-circle" title="{{\App\Models\User::find($tu->user_id)->name}}" alt="{{\App\Models\User::find($tu->user_id)->name}}" src="{{\App\Models\User::find($tu->user_id)->profile_photo_url}}">
                                <a href="{{route('removeTeamUser',$tu->id)}}" class="text-sm text-danger"><small data-feather="trash-2"></small></a>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
</div>



    <div class="customize_popup">
        <div class="modal fade" id="info{{$t->id}}" tabindex="-1" aria-labelledby="staticBackdropLabels1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">

                    <div class="modal-header text-centers border-0">
                        <span class="text-sm text-center" id="staticBackdropLabels1">{!! $t->description !!}</span>
                    </div>

                    <div class="modal-footer text-centers">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>


        <div class="customize_popup">
            <div class="modal fade" id="teamChef{{$t->id}}" tabindex="-1" aria-labelledby="staticBackdropLabels1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                        <h5 class="title text-center">Select A Chief of this team </h5>
                        <div class="modal-header text-centers border-0">
                            <form method="POST" action="{{route('chefUnity',$t->id)}}">
                                @csrf
                                <select class="form-control" name="user">
                                    @forelse(\App\Models\TeamUser::where([
                                'team_id' => $t->id,
                                ])->get() as $tu)
                                    <option value="{{$tu->user_id}}">{{\App\Models\User::find($tu->user_id)->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                        <div class="modal-footer text-centers">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                            </form>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    
        <div class="customize_popup">
            <div class="modal fade" id="team{{$t->id}}" tabindex="-1" aria-labelledby="staticBackdropLabels1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                        <div class="modal-header text-centers border-0">
                            <h5 class="modal-title text-center" id="staticBackdropLabels1">Add User on team</h5>
                        </div>

                        <form method="POST" action="{{route('teamUser',$t->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-footer text-centers">
                                <select class="form-control" name="users[]" multiple>
                                    @forelse($users as $u)
                                        @if(\App\Models\TeamUser::where([
                                            'user_id' => $u->id])->count() == 0)
                                            <option value="{{$u->id}}">{{$u->name}}</option>
                                        @endif
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="modal-footer text-centers">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button type="button" class=" btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="customize_popup">
            <div class="modal fade" id="delete{{$t->id}}" tabindex="-1" aria-labelledby="staticBackdropLabels1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">

                        <div class="modal-header text-centers border-0">
                            <h5 class="modal-title text-center" id="staticBackdropLabels1">Are You Sure Want to Delete?</h5>
                        </div>

                        <div class="modal-footer text-centers">
                        <button type="button" class=" btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                        <a href="{{route('deleteTeam',$t->id)}}" class="btn btn-danger">Delete</a>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="customize_popup">
            <div class="modal fade" id="edit{{$t->id}}" tabindex="-1" aria-labelledby="staticBackdropLa" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLa">Edit Team {{ $t->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class=" col-md-12 p-0">
                                <form method="post" action="{{route('editTeam',$t->id)}}">
                                    @csrf
                                    <br>
                                    <div class=" form m-0">
                                        <input type="text" placeholder="Name" value="{{$t->name}}" name="name" class="form-control">
                                    </div>
                                    <br>
                                    <div class=" form-popup m-0">
                                        <textarea rows="4" name="description" class="form-control">{{ $t->description }}</textarea>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@empty

@endforelse


</div> 

</div>
</div>
</div>
</div>

</div>
</div>
<div class="container">
    {{$teams->links()}}
</div>
<div class="customize_popup">
<div class="modal fade" id="addteam" tabindex="-1" aria-labelledby="staticBackdropLabela" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title text-sm" id="staticBackdropLabela">Create New Team</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class=" col-md-12 p-0">

<form method="POST" action="{{route('createTeam')}}" autocomplete="off">
    @csrf

    <div class=" form m-0">
    <span class="text-danger">*</span>
    <input class="form-control" type="text" placeholder="Name" name="name" required>
    @error('name')<span class="text-danger">{{$message}}</span>@enderror
</div>
<br>
    <div class=" form-popup m-0">
   <textarea placeholder="description" name="description" class="form-control" row="5"></textarea>
    @error('description')<span class="text-danger">{{$message}}</span>@enderror
</div>
<br>

<div class="modal-footer">
<button type="submit" class="btn-sm btn-outline-primary">Add</button>
<button type="button" class="btn-sm btn-danger" data-dismiss="modal">Cancel</button>
</div>
</form>


</div>
</div>

</div>
</div>
</div>
</div>









@endsection