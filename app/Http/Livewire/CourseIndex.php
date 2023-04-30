<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseIndex extends Component
{
    public function render()
    {
        return view('livewire.course-index',[
            'courses' => Course::latest()->paginate(8)
        ]);
    }

    public function courseDelete($id)
    {
        $course = Course::findOrFail($id);
        $course->curriculums()->delete();
        $course->students()->detach();
        $course->delete();
        flash()->addSuccess('Course deleted successfully.');
    }
}
