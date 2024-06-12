<?php

namespace App\Livewire;

use Livewire\Component;

class RoleSelect extends Component
{
    public $selectedRole = '';
    public function render()
    {
        return view('livewire.role-select');
    }

    public function updatedSelectedRole()
    {
        $this->emit('roleSelected', $this->selectedRole);
    }
}