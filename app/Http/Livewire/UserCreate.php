<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;
    public function render()
    {
        return view('livewire.user-create',[
            'roles' => Role::all()
        ]);
    }
}
