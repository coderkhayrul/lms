<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Lead;
use App\Models\Payment;
use App\Models\User;
use Livewire\Component;

class Admission extends Component
{
    public $search;
    public $leads = [];
    public $lead_id;
    public $course_id;
    public $selectedCourse;

    public $payment;

    public function render()
    {
        $courses = Course::all();
        return view('livewire.admission', [
            'courses' => $courses
        ]);
    }

    public function search()
    {
        $this->leads = Lead::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('phone', 'like', '%'.$this->search.'%')
            ->get();
    }

    public function courseSelected()
    {
        $this->selectedCourse = Course::find($this->course_id);
    }

    public function admit()
    {
        $lead = Lead::find($this->lead_id);
        $user = User::create([
            'name' => $lead->name,
            'email' => $lead->email,
            'phone' => $lead->phone,
            'password' => bcrypt('password'),
        ]);
        $lead->delete();
        $invoice = Invoice::create([
            'due_date' => now()->addDays(7),
            'user_id' => $user->id,
        ]);
        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'name' => 'Course: '.$this->selectedCourse->name,
            'price' => $this->selectedCourse->price,
            'quantity' => 1,
        ]);

        $this->selectedCourse->students()->attach($user->id);

        if (!empty($this->payment)) {
            Payment::create([
                'invoice_id' => $invoice->id,
                'amount' => $this->payment,
            ]);
        }

        $this->search = '';
        $this->leads = [];
        $this->lead_id = '';
        $this->course_id = '';
        $this->selectedCourse = '';
        flash()->addSuccess('Admission successful');
        return redirect()->route('admission');
    }

}
