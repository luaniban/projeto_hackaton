<?php

namespace App\Livewire\Users\Cargos;

use App\Models\Role;
use Livewire\Component;
use Livewire\Attributes\On;
use TallStackUi\Traits\Interactions;

class Create extends Component
{
    use Interactions;

    public $modal = false;
    public $name;


    #[On("dispatch-create-cargo")]
    public function openCreateRoleModal()
    {
        $this->reset(['name']);
        $this->modal = true;
    }

    public function closeCreateRoleModal()
    {
        $this->modal = false;
    }

    public function createRole()
    {
        $this->validate([
            'name' => 'required|min:2|unique:roles,name'
        ]);

        Role::create([
            'name' => $this->name
        ]);

        $this->modal = false;

        $this->toast()->success('Cargo criado com sucesso!')->send();

        $this->dispatch('role-created'); 
    }

    public function render()
    {
        return view('livewire.users.cargos.create');
    }
}
