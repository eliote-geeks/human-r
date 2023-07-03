@extends('layout.app')
@section('content')

@include('header.header')
@include('header.sidebar')






<div class="page-wrapper">
<div class="content container-fluid">
<div class="row">
<div class="col-xl-12 col-sm-12 col-12 ">
<div class="breadcrumb-path mb-4">
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html"><img src="assets/img/dash.png" class="mr-2" alt="breadcrumb">Home</a>
</li>
<li class="breadcrumb-item active"> Profile</li>
</ul>
<h3>Profile	</h3>
</div>
</div>
<div class="col-xl-12 col-sm-12 col-12 mb-4">
<div class="head-link-set">

@include('header.nav-user')

</div>
</div>
<div class="col-xl-12 col-sm-12 col-12 ">
<div class="row">
<div class="col-xl-6 col-sm-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header">
<h2 class="card-titles">Add {{$user->name}} to Another Team</h2>
</div>
<div class="card-body">

<div class="form-group">
    <select class="select">
        <option value="Select leave">Select Team</option>
        <option value="leave">Team A</option>
        <option value="leave">Team B</option>
    </select>
</div>

<div class="form-btn">
    <a href="#" class="btn btn-applys">New Team</a>
</div>
</div>
</div>
</div>
<div class="col-xl-6 col-sm-12 col-12 d-flex">
<div class="card card-lists flex-fill">
<div class="card-header">
<h2 class="card-titles">PHP Team</h2>
<ul>
<li><a class="edit-link" data-toggle="modal" data-target="#edit_working"><i data-feather="edit"></i></a></li>
<li><a class="delete-link" data-toggle="modal" data-target="#delete"><i data-feather="trash-2"></i></a></li>
</ul>
</div>
<div class="card-body d-flex align-items-center">
<div class="member-img">
<img src="{{$user->profile_photo_url}}" alt="profile" class="mr-3">
<label>{{ $user->name }}</label>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-12 col-sm-12 col-12 ">

</div>
<div class="col-xl-12 col-sm-12 col-12 ">
<div class="row">
<div class="col-xl-6 col-sm-12 col-12 d-flex">
<div class="card card-lists flex-fill">
<div class="card-header">
<h2 class="card-titles">{{$user->name}}'s Manager</h2>
<ul>
<li><a class="edit-link" data-toggle="modal" data-target="#changemanager"><i data-feather="edit"></i></a></li>
<li><a class="delete-link" data-toggle="modal" data-target="#delete"><i data-feather="trash-2"></i></a></li>
</ul>
</div>
<div class="card-body">
<div class="member-formcontent  border-0 ">
<div class="member-imgs">
<img src="{{$user->profile}}" alt="profile" />
<div class="member-name">
<label>{{$user->name}}</label>
<span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="056864776c64666a71716a6b45607d64687569602b666a68">[email&#160;protected]</a></span>
</div>
</div>
<div class="member-btn">
<a href="#" class="btn btn-applys" data-toggle="modal" data-target="#changemanager">Change Manager</a>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-6 col-sm-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header">
<h2 class="card-titles">Who Reports to Maria Cotton</h2>
</div>
<div class="card-body">
<div class="member-formcontent ">
<div class="avatar-group">
<div class="avatar avatar-xs group_img group_header">
<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-14.jpg">
</div>
<div class="avatar avatar-xs group_img group_header">
<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-10.jpg">
</div>
<div class="avatar avatar-xs group_img group_header">
<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-15.jpg">
</div>
</div>
<div class="member-btn">
<a href="#" class="btn btn-applys">Add people</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-12 col-sm-12 col-12 ">
<div class="row">
<div class="col-xl-6 col-sm-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header">
<h2 class="card-titles">Position</h2>
</div>
<div class="card-body">
<div class="form-group">
<input type="text" placeholder="Job Title" />
</div>
<div class="form-group">
<input type="text" placeholder="Permanent" />
</div>
<div class="form-btn">
<a href="#" class="btn btn-applys">PHP Team Lead</a>
<a href="#" class="btn btn-applys">Permanent</a>
</div>
</div>
</div>
</div>
<div class="col-xl-6 col-sm-12 col-12 d-flex">
<div class="card card-lists flex-fill">
<div class="card-header">
<h2 class="card-titles">Working Week<span>Set the dates that your company works.</span></h2>
<a class="edit-link" data-toggle="modal" data-target="#edit_workings"><i data-feather="edit"></i></a>
</div>
<div class="card-body d-flex ">
<div class="form-week">
<ul>
<li><a class="active">Mon</a></li>
<li><a class="active">Tue</a></li>
<li><a class="active">Wed</a></li>
<li><a class="active">Thur</a></li>
<li><a class="active">Fri</a></li>
<li><a class="inactive">Sat</a></li>
<li><a class="inactive">Sun</a></li>
</ul>
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