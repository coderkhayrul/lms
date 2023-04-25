<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use App\Models\Note;
use Livewire\Component;

class LeadEdit extends Component
{
    public  $lead_id;
    public $name;
    public $email;
    public $phone;
    public $note;

    public function mount(){
        $lead = Lead::findOrFail($this->lead_id);
        $this->lead_id = $lead->id;
        $this->name = $lead->name;
        $this->email = $lead->email;
        $this->phone = $lead->phone;
    }
    protected $rules = [
        'email' => 'required|email',
        'phone' => 'required',
    ];
    public function render()
    {
        $lead = Lead::findOrFail($this->lead_id);
        return view('livewire.lead-edit', [
            'notes' => $lead->notes
        ]);
    }

    public function submitForm(){
        sleep(2);
        $lead = Lead::findOrFail($this->lead_id);
        //  form validation
        $this->validate();
        $lead->name = $this->name;
        $lead->email = $this->email;
        $lead->phone = $this->phone;
        $lead->update();
        flash()->addSuccess('Lead updated successfully.');
//        return redirect()->route('leads.index');
        return redirect()->back();
    }
    public function addNote(){
        $note = new Note();
        $note->description = $this->note;
        $note->lead_id = $this->lead_id;
        $this->note = '';
        $note->save();
        flash()->addSuccess('Note added successfully.');
        return redirect()->back();
    }
}
