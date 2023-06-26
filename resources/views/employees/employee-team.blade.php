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
<div class="card-body pb-0">
<div class="row">
@forelse($teams as $t)

<div class="col-xl-6">
    <div class="card">
        <div class="card-header">
            <div class="employee-head">
                <h2>{{\Str::title($t->name)}} <i style="cursor:pointer;" data-feather="info"  data-toggle="modal" data-target="#info{{$t->id}}"></i></h2>
                <ul>
                    <li><a class="edit_employee" data-toggle="modal" data-target="#edit"><i data-feather="edit"></i></a></li>
                    <li><a class="edit_delete" data-toggle="modal" data-target="#delete"><i data-feather="trash-2"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="card-body">
            <div class="employee-content">
                <div class="employee-image">
                    <div class="avatar-group">
                        <div class="avatar avatar-xs group_img group_header">
                            <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-14.jpg">
                        </div>
                    <div class="avatar avatar-xs group_img group_header">
                        <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-15.jpg">
                    </div>

                </div>
            </div>
                <a class="btn-sm btn-info" data-toggle="modal" data-target="#addteam">Add Members</a>
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

@empty

@endforelse


</div> 
</div>
</div>
</div>
</div>
</div>
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
<div class="customize_popup">
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="staticBackdropLa" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="staticBackdropLa">Edit Employee</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class=" col-md-12 p-0">
<div class=" form-popup m-0">
<input type="text" placeholder="Name">
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary">Add</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>
</div>
</div>
    <div class="customize_popup">
        <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="staticBackdropLabels1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">

                    <div class="modal-header text-centers border-0">
                        <h5 class="modal-title text-center" id="staticBackdropLabels1">Are You Sure Want to Delete?</h5>
                    </div>

                    <div class="modal-footer text-centers">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>

                </div>
            </div>
        </div>
    </div>







@endsection