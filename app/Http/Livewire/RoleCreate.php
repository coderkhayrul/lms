<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreate extends Component
{
    public $name;
    public $selectPermission = [];

    protected $rules = [
        'name' => 'required|unique:roles,name',
        'selectPermission' => 'required|array|min:1',
    ];
    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.role-create', compact('permissions'));
    }

    public function submitForm(){
        $this->validate();
        $role = Role::create(['name' => $this->name]);
        $role->syncPermissions($this->selectPermission);
        flash()->addSuccess('Role created successfully!');
        return redirect()->route('roles.index'); }
}
