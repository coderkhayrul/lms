<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\curriculum;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Livewire\Component;

class CourseCreate extends Component
{
    public $name;
    public $description;
    public $price;
    public $time;
    public $selectedDays = [];
    public $end_date;

    public $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ];

//    function mount(): void
//    {
//        $this->name = 'First Name';
//        $this->description = 'Description';
//        $this->price = 500;
//        $this->end_date = Carbon::now()->format('Y-m-d');
//    }

    protected $rules = [
        'name' => 'required|unique:courses,name',
        'description' => 'required',
        'price' => 'required',
        'selectedDays' => 'required',
        'time' => 'required'
    ];

    public function render()
    {
        return view('livewire.course-create');
    }

    /**
     * @throws \Exception
     */
    public function formSubmit()
    {
        $this->validate();
        $course = Course::create([
            'name' => $this->name,
            'slug' => str_replace(' ', '-', $this->name),
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => auth()->user()->id,
        ]);
        $i = 1;
        $start_date = new DateTime(Carbon::now());
        $end_date =   new DateTime($this->end_date);
        $interval = new DateInterval('P1D');
        $date_range = new DatePeriod($start_date, $interval, $end_date);
        foreach ($date_range as $date){
            foreach ($this->selectedDays as $day){
                if($date->format("l") === $day){
                    curriculum::create([
                        'name' => $this->name . ' #' . $i++,
                        'week_day' => $day,
                        'class_time' => $this->time,
                        'end_date' => $this->end_date,
                        'course_id' => $course->id,
                    ]);
                }
            }
        }
        $i++;
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->selectedDays = [];
        $this->time = '';
        $this->end_date = '';
        flash()->addSuccess('Course created successfully.');
    }

}
