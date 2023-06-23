
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
                                </div>
                            </div>

                            <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                <label>Last Name</label>
                                    <input type="text" placeholder="Last Name" wire:model.defer='last_name'>
                                </div>
                            </div>

                            
                           <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                <label>Email</label>
                                    <input type="email" placeholder="email" wire:model.defer='email' class="form-control">
                                </div>

                            </div>

                                                        <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                <label>Number</label>
                                    <input type="text" placeholder="phone" wire:model.defer='phone'>
                                </div>
                            </div>


                          <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                <label>Address</label>
                                    <input type="text" placeholder="address" wire:model.defer='address'>
                                </div>
                            </div>


                                                      <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                <label>Start Date</label>
                                    <input type="date" class="form-control" placeholder="start date" wire:model.defer='sart_date'>
                                </div>
                            </div>



                           <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" placeholder="end date" wire:model.defer='end_date' class="form-control">
                                </div>

                            </div>


                         <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                <label>
                                <label>Gender</label>
                                    <select wire:model.defer='gender'>
                                        <option>M</option>
                                        <option>W</option>
                                    </select>
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
                                    </div>

                                    <div class="form-group">
                                    <label>Type</label>
                                            <select wire:model.defer='type' class="form-control">
                                            <option>Permanent</option>
                                            <option>Freelance</option>
                                            </select>
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
                                </div>
                            </div>

                            <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                <label>Frequency</label>
                                    <select wire:model.defer='frequency'>
                                        <option>Annualy</option>
                                        <option>Monthly</option>
                                        <option>Weekly</option>
                                        <option>Daily</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-sm-12 col-12 ">
                <button class="btn btn-outline-success">Add Member</button>
                <button class="btn btn-danger" type="button" wire:click='re' wire:loading.attr='disabled'>Reset</button>
                @if()<p></p>
                </div>                
        
                
            </div>
        </div>
    </div>


