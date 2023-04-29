<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CourseCreate extends Component
{
    public $name;
    public $description;
    public $price;
    public $status;

    public $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ];

    function mount(): void
    {
        $this->name = 'First Name';
        $this->description = 'Description';
        $this->price = 500;
    }

    protected $rules = [
        'name' => 'required|min:6|unique:courses,name',
        'description' => 'required',
        'price' => 'required|numeric',
    ];

    public function render()
    {
        return view('livewire.course-create');
    }

    public function formSubmit()
    {
        $this->validate();
        dd('Form submitted.');
    }
}
