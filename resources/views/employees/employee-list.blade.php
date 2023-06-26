@extends('layout.app')
@section('content')
@include('header.header')
@include('header.sidebar')






<div class="page-wrapper">
<div class="content container-fluid">
<div class="row">
<div class="col-xl-12 col-sm-12 col-12">
<div class="breadcrumb-path mb-4">
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><img src="assets/img/dash.png" class="mr-2" alt="breadcrumb" />Home</a>
</li>
<li class="breadcrumb-item active"> Employees</li>
</ul>
<h3>Employees</h3>
</div>
</div>
<div class="col-xl-12 col-sm-12 col-12 mb-4">
<div class="head-link-set">
<ul>
<li><a class="active" href="javascript:;">All</a></li>
<li><a href="{{route('employeeTeams')}}">Teams</a></li>
<li><a href="employee-office.html">Offices</a></li>
</ul>
<a class="btn-add" href="{{route('add-employee')}}"><i data-feather="plus"></i> Add Person</a>
</div>
</div>
<div class="col-xl-12 col-sm-12 col-12 mb-4">
<div class="row">
<div class="col-xl-10 col-sm-8 col-12 ">
<label class="employee_count">{{$employees->count()}} People{{$employees->count() > 0 ? 's' :''}}</label>
</div>
<div class="col-xl-1 col-sm-2 col-12 ">
<a href="employee-grid.html" class="btn-view "><i data-feather="grid"></i> </a>
</div>
<div class="col-xl-1 col-sm-2 col-12 ">
<a href="javascript:;" class="btn-view active"><i data-feather="list"></i> </a>
</div>
</div>
</div>
<div class="col-xl-12 col-sm-12 col-12 mb-4">
<div class="card">
<div class="table-heading">
<h2>Project Summery</h2>
</div>
<div class="table-responsive">
<table class="table  custom-table no-footer" id="dataTableBasic">
<thead>
<tr>
<th>Name</th>
<th>Line Manager</th>
<th>Team</th>
<th>Office</th>
<th>Permissions</th>
<th>Status</th>
</tr>
</thead>
<tbody>
@forelse($employees as $e)
    <tr>
        <td>
            <div class="table-img">
                <a href="profile.html">
                    <img src="{{\App\Models\User::find($e->id)->profile_photo_url}}" alt="profile" class="img-table" /><label>{{$e->name}}</label>
                </a>
            </div>
        </td>
    <td>
        <label class="action_label">Richard Wilson </label>
    </td>
    <td>
        <label class="action_label2">Design </label>
    </td>
    <td><label>Focus Technologies	</label></td>
    <td><label>Team Lead</label></td>
    <td class="tab-select">
<a class="btn btn-info" href="">Active</a>
    </td>
</tr>
@empty
@endforelse
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>






@endsection