<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Livewire\Component;
use Livewire\WithPagination;

class LeadIndex extends Component
{
    public function render()
    {
        $leads = Lead::paginate(10);
        return view('livewire.lead-index', compact('leads'));
    }

    public function leadDelete($id)
    {
        $lead = Lead::find($id);
        $lead->delete();
        flash()->addSuccess('Lead Deleted Successfully.');
        return back();
    }

}
