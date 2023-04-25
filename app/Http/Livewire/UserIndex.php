<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.user-index', compact('users'));
    }

    public function userDelete($id){
        $user = User::findorFail($id);
        $user->delete();
        flash()->addSuccess('User deleted successfully.');
    }
}
