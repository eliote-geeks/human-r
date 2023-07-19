@extends('layout.app')
<base href="/">
@section('content')
    @include('header.header')
    @include('header.sidebar')






    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xl-12 col-sm-12 col-12 ">
                    <div class="breadcrumb-path mb-4">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><img
                                        src="{{ asset('assets/img/dash.png') }}" class="mr-2" alt="breadcrumb">Home</a>
                            </li>
                            <li class="breadcrumb-item active"> Profile</li>
                        </ul>
                        <h3>Profile </h3>
                    </div>
                </div>
                <div class="col-xl-12 col-sm-12 col-12 mb-4">
                    <div class="head-link-set">

                        @include('header.nav-user')

                    </div>
                </div>
                <div class="col-xl-12 col-sm-12 col-12 ">
                    <div class="row">
                        <div class="col-xl-12 col-sm-12 col-12 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h2 class="card-titles">Add {{ $user->name }} to Another Team</h2>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('changeTeamUser', $user->id) }}">
                                        @csrf
                                        <div class="form-group">
                                            <select class="select" name="team">
                                                @if (\App\Models\Team::team($user->id) == 'none')
                                                    <option value="">Select Team</option>
                                                @else
                                                    <option
                                                        value="{{ \App\Models\Team::where('name', \App\Models\Team::team($user->id))->first()->id }}">
                                                        {{ \App\Models\Team::team($user->id) }}</option>
                                                @endif
                                                @forelse ($teams as $t)
                                                    @if (\App\Models\Team::team($user->id) != $t->name)
                                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                                    @endif
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>

                                        <div class="form-btn">
                                            <button type="submit" class="btn btn-applys">New Team</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-12 col-12 d-flex">
                            <div class="card card-lists flex-fill">
                                <div class="card-header">
                                    <h2 class="card-titles">{{ \Str::title(\App\Models\Team::team($user->id)) }} Team</h2>
                                    {{-- <ul>
                                        <li><a class="edit-link" data-toggle="modal" data-target="#edit_working"><i
                                                    data-feather="edit"></i></a></li>
                                        <li><a class="delete-link" data-toggle="modal" data-target="#delete"><i
                                                    data-feather="trash-2"></i></a></li>
                                    </ul> --}}
                                </div>
                                <div class="card-body d-flex align-items-center">
                                    <div class="member-img">
                                        <img src="{{ \App\Models\User::find($user->id)->profile_photo_url }}" alt="profile"
                                            class="mr-3">
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
                        <div class="col-xl-12 col-sm-12 col-12 d-flex">
                            <div class="card card-lists flex-fill">
                                <div class="card-header">
                                    <h2 class="card-titles">{{ $user->name }}'s Manager</h2>
                                    {{-- <ul>
                                        <li><a class="edit-link" data-toggle="modal" data-target="#changemanager"><i
                                                    data-feather="edit"></i></a></li>
                                        <li><a class="delete-link" data-toggle="modal" data-target="#delete"><i
                                                    data-feather="trash-2"></i></a></li>
                                    </ul> --}}

                                </div>
                                {{-- @if (\App\Models\Team::ChiefTeam($user->id) == $user->name) --}}

                                <div class="card-body">
                                    <div class="member-formcontent  border-0 ">
                                        @if (\App\Models\Team::teamChief($user->id) != 'no team')
                                            @if (\App\Models\Team::teamChief($user->id) != 'no Team Leader')
                                                <div class="member-imgs">
                                                    <img
                                                        src="{{ \App\Models\User::where('name', \App\Models\Team::teamChief($user->id))->first()->profile_photo_url }}">
                                                    <div class="member-name">
                                                        <label>{{ \App\Models\Team::teamChief($user->id) }}</label>
                                                        {{-- <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                        data-cfemail="056864776c64666a71716a6b45607d64687569602b666a68">[{{ \App\Models\Team::ChiefTeam($user->id) }}]</a></span> --}}
                                                    </div>
                                            @endif
                                    </div>
                                    @endif
                                    {{-- <div class="member-btn">
                                             <a href="#" class="btn btn-applys" data-toggle="modal"
                                                data-target="#changemanager">Change Manager</a>
                                        </div> --}}
                                </div>
                            </div>

                            {{-- @endif --}}
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-12 col-sm-12 col-12 ">
                <div class="row">
                    <form method="POST" action="{{ route('positionEdit', $user->id) }}">
                        @csrf
                        <div class="col-xl-12 col-sm-12 col-12 ">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h2 class="card-titles">Position</h2>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input name="job" type="text" placeholder="Job Title"
                                            value="{{ $user->job }}" />
                                    </div>

                                    <div class="form-group">
                                        <label>Type</label>
                                        <input type="text" placeholder="Permanent" value="{{ $user->type }}"
                                            name="type" />
                                    </div>

                                    <div class="form-group">
                                        <label>Frequency</label>
                                        <input type="text" placeholder="Permanent" value="{{ $user->frequency }}"
                                            name="frequency" />
                                    </div>
                                    <div class="form-btn">
                                        {{-- <p class="btn btn-applys">{{ \App\Models\Team::team($user->id) }}
                                            {{ \App\Models\Team::ChiefTeam($user->id) == $user->name ? 'Lead' : '' }}
                                        </p> --}}
                                        <button type="submit" class="btn btn-applys">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-12 col-12 d-flex">
                            <div class="card card-lists flex-fill">
                                <div class="card-header">
                                    <h2 class="card-titles">Working Week<span>Set the dates that your company works.</span>
                                    </h2>
                                    {{-- <a class="edit-link" data-toggle="modal" data-target="#edit_workings"><i
                                            data-feather="edit"></i></a> --}}
                                </div>
                                <div class="card-body d-flex ">
                                    <div class="form-week">
                                        <ul>
                                            <li><a class="{{\App\Models\Week::where(['day' => 1,'user_id' => $user->id])->count() > 0 ? 'active' : 'inactive'}}" href="{{route('editWeek',[1,$user->id])}}">Mon</a></li>
                                            <li><a class="{{\App\Models\Week::where(['day' => 2,'user_id' => $user->id])->count() > 0 ? 'active' : 'inactive'}}" href="{{route('editWeek',[2,$user->id])}}">Tue</a></li>
                                            <li><a class="{{\App\Models\Week::where(['day' => 3,'user_id' => $user->id])->count() > 0 ? 'active' : 'inactive'}}" href="{{route('editWeek',[3,$user->id])}}">Wed</a></li>
                                            <li><a class="{{\App\Models\Week::where(['day' => 4,'user_id' => $user->id])->count() > 0 ? 'active' : 'inactive'}}" href="{{route('editWeek',[4,$user->id])}}">Thur</a></li>
                                            <li><a class="{{\App\Models\Week::where(['day' => 5,'user_id' => $user->id])->count() > 0 ? 'active' : 'inactive'}}" href="{{route('editWeek',[5,$user->id])}}">Fri</a></li>
                                            <li><a class="{{\App\Models\Week::where(['day' => 6,'user_id' => $user->id])->count() > 0 ? 'active' : 'inactive'}}" href="{{route('editWeek',[6,$user->id])}}">Sat</a></li>
                                            <li><a class="{{\App\Models\Week::where(['day' => 7,'user_id' => $user->id])->count() > 0 ? 'active' : 'inactive'}}" href="{{route('editWeek',[7,$user->id])}}">Sun</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
