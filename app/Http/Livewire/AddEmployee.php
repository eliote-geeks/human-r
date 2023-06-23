<?php

namespace App\Http\Livewire;

use App\Models\Employe;
use App\Models\User;
use Livewire\Component;

class AddEmployee extends Component
{
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

    public function save()
    {
        $this->validate([
            'type' => 'required|string',
            'job' => 'required|string',
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'salary' =>'required|numeric|min:0|max:999999.99',
            'gender' => 'required|string',
            'address' => 'required|string',
            'start_date' => 'required|date|after_or_equal:today',
            'phone' => 'required|regex:/^6[0-9]{8}$/|digits:9',
            'frequency' =>'required|string'
        ]);

        if($this->end_date != null)
        {
            $this->validate([
                'end_date' => 'date|after:start_date'
            ]);
        }

        $user = new User();
        $user->name = $this->first_name.' '.$user->last_name;
        $user->phone = $this->phone;
        $user->email = $this->email;
        $user->user_type = $this->type;
        $user->address = $this->address;
        $user->salary = $this->salary;
        $user->gender = $this->gender;
        $user->frequency = $this->frequency;
        $user->start_date = $this->start_date;
        if($this->end_date != null)
            $user->end_date = $this->end_date;
        

        $user->password = '12345678';
        $user->save();

        $employee = new Employe();
        $employee->job = $this->job;
        $employee->type = $this->type;
        $employee->user_id = $user->id;
        $employee->save();
        $this->reset();
        session()->flash('message','saved successfully !');

    }
    public function render()
    {
        return view('livewire.add-employee');
    }
}
