
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}


    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">

                <div class="col-xl-12 col-sm-12 col-12 ">
                    <div class="breadcrumb-path mb-4">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active"> Employees</li>
                        </ul>
                        <h3>Create Employees</h3>
                    </div>
                </div>

                <div class="col-xl-12 col-sm-12 col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-titles">Basic Details <span>Organized and secure.</span></h2>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-sm-12 col-12 ">
                                    <div class="form-group">
                                    <label>Frst Name</label>
                                    <input type="text" placeholder="First Name" wire:model.defer='first_name'>
                                    @error('first_name')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>

                            <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                <label>Last Name</label>
                                    <input type="text" placeholder="Last Name" wire:model.defer='last_name'>
                                    @error('last_name')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>

                            
                           <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                <label>Email</label>
                                    <input type="email" placeholder="email" wire:model.defer='email' class="form-control">
                                    @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                </div>

                            </div>

                                                        <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                <label>Number</label>
                                    <input type="text" placeholder="phone" wire:model.defer='phone'>
                                    @error('phone')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>


                          <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                <label>Address</label>
                                    <input type="text" placeholder="address" wire:model.defer='address'>
                                    @error('address')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>


                                                      <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                <label>Start Date</label>
                                    <input type="date" class="form-control" placeholder="start date" wire:model.defer='start_date'>
                                    @error('start_date')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>



                           <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" placeholder="end date" wire:model.defer='end_date' class="form-control">
                                    @error('end_date')<span class="text-danger">{{$message}}</span>@enderror
                                </div>

                            </div>


                         <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                <label>
                                <label>Gender</label>
                                    <select wire:model.defer='gender'>
                                    <option value="">Select Sex</option>
                                        <option>M</option>
                                        <option>W</option>
                                    </select>
                                    @error('gender')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                                <div class="col-xl-12 col-sm-12 col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-titles">Employment Details
 <span>Let everyone know the essentials so they're fully prepared.</span></h2>
                        </div>

                        <div class="card-body">
                            
                                <div class="col-xl-12 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <label> Job Title</label>
                                        <input type="text" placeholder="Job Title" class="form-control" wire:model.defer='job'>
                                        @error('job')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>

                                    <div class="form-group">
                                    <label>Type</label>
                                            <select wire:model.defer='type' class="form-control">
                                            <option value="">Select Type</option>
                                            <option>Permanent</option>
                                            <option>Freelance</option>
                                            </select>
                                            @error('type')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                </div>



                                
                            </div>
                        </div>



                                <div class="col-xl-12 col-sm-12 col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-titles">Salary Details
                            <span>Stored securely, only visible to Super Admins, Payroll Admins, and themselves
.</span></h2>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-sm-12 col-12 ">
                                    <div class="form-group">
                                    <label>Salary</label>
                                    <input type="text" placeholder="salary" wire:model.defer='salary'>
                                    @error('salary')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>

                            <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                <label>Frequency</label>
                                    <select wire:model.defer='frequency'>
                                    <option value="">Select Frequency</option>
                                        <option>Annualy</option>
                                        <option>Monthly</option>
                                        <option>Weekly</option>
                                        <option>Daily</option>
                                    </select>
                                    @error('frequency')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-sm-12 col-12 ">
                @if(session()->has('message'))<p class="alert alert-info">{{ session('message') }}</p>@endif
                <button wire:click='save' wire:loading.attr='disabled' type="button" class="btn btn-outline-success">Add Member</button>
                <button class="btn btn-danger" type="button" wire:click='re' wire:loading.attr='disabled'>Reset</button>
                
                </div>                
        
                
            </div>
        </div>
    </div>



