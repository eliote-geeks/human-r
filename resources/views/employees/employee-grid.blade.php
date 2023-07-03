@extends('layout.app')
<base href="/">
@section('content')

@include('header.header')
@include('header.sidebar')



<div class="page-wrapper">
<div class="content container-fluid">
<div class="row">
<div class="col-xl-12 col-sm-12 col-12 mb-4">
<div class="breadcrumb-path ">
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
<label class="employee_count">{{ $employees->count() }} People</label>
</div>
<div class="col-xl-1 col-sm-2 col-12 ">
<a href="javascript:;" class="btn-view active "><i data-feather="grid"></i> </a>
</div>
<div class="col-xl-1 col-sm-2 col-12 ">
<a href="{{route('employees')}}" class="btn-view "><i data-feather="list"></i> </a>
</div>
</div>
</div>
<div class="col-xl-12 col-sm-12 col-12 ">
<div class="card grid-views">
<div class="card-body">
<div class="row">

@forelse ($employees as $e)
    <div class="col-xl-4 col-sm-12 col-12 ">
        <div class="employee_grid">
            <a href="profile.html"><img src="{{(\App\Models\User::find($e->id))->profile_photo_url}}" alt="profile" /></a>
            <h5>{{$e->name}}</h5>
            <label>{{\App\Models\Team::team($e->id)}} Team {{\App\Models\Team::ChiefTeam($e->id) == $e->name ? 'Lead' : 'Member'}}</label>
            <a><span class="__cf_email__" data-cfemail="254844574c44464a51514a4b65405d44485549400b464a48">{{$e->email}}</span></a>
        </div>
    </div>
@endforeach

</div>
<div class="row pagination_path">
<div class="col-sm-12 col-md-5">
<div class="dataTables_info" role="status" aria-live="polite">Showing {{$employees->currentPage()}}  to {{$employees->perPage()}} of {{\App\Models\Employe::count()}} entries</div>

</div>
<div class="col-sm-12 col-md-7">
<div class="dataTables_paginate paging_simple_number">
    {{$employees->links()}}
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>








@endsection