<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Carbon\Carbon;
use Livewire\Component;

class CourseCreate extends Component
{
    public $name;
    public $description;
    public $price;
    public $status;
    public $time;
    public $end_date;
    public $sundays = [];
    public $selectedDays = [];



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
//        $this->end_date = Carbon::now()->format('Y-m-d');
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
        $course = Course::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => auth()->user()->id,
        ]);
    }
}
