<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;
class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $role;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'role' => 'required',
    ];

    public function render()
    {
        return view('livewire.user-create',[
            'roles' => Role::where('name','!=','SuperAdmin')->get()
        ]);
    }

    public function submitForm()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $user->assignRole($this->role);
        flash()->addSuccess('User Created Successfully');
        return redirect()->route('users.index');
    }
}
