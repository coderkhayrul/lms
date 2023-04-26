<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class RoleIndex extends Component
{
    public function render()
    {
        return view('livewire.role-index',[
            'roles' => Role::where('name', '!=', 'SuperAdmin')->paginate(10)
        ]);
    }

    public function roleDelete($id){
        $role = Role::findOrFail($id);
        $role->delete();
        flash()->addSuccess('Role deleted successfully!');
        return redirect()->back();
    }
}
