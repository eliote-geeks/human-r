<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddEmployee extends Component
{
    // $table->string('name');
    // $table->string('phone')->nullable();
    // $table->string('position')->nullable();
    // $table->string('department')->nullable();
    // $table->date('start_date')->nullable();
    // $table->date('end_date')->nullable();
    // $table->string('address')->nullable();
    // $table->string('gender')->nullable();
    // $table->string('salary')->nullable();
    // $table->string('profile')->nullable();
    // $table->string('first_name')->nullable();
    // $table->string('last_name')->nullable();
    // $table->string('email')->unique();
    // $table->string('user_type')->nullable();
    // $table->string('frequency')->nullable();
    public $name;
    public $phone;
    public $position;
    public $department;
    public $start_date;
    public $end_date;
    public $address;
    public $gender;
    public $salary;                                                                                 
    public $email;
    public $frequency;
    public $first_name;
    public $last_name;
    public $job;
    public $type; //freelance  employee


    public function re()
    {
        $this->reset();
        session()->flash('message','Clear');
    }
    public function render()
    {
        return view('livewire.add-employee');
    }
}
