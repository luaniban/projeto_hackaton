<?php

namespace App\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class Table extends Component
{

    public $users;
    public $search = '';
    public $filterStatus = '';
    public $filterRole = '';
    public $roles;

    public function dispatch_create(){
        $this->dispatch("dispatch-create-user");
    }

    public function dispatch_edit($id){
        $this->dispatch("dispatch-edit-user", $id);
    }

    public function dispatch_delete($id){
        $this->dispatch("dispatch-delete-user", $id);
    }

    public function dispatch_create_cargo(){
        $this->dispatch("dispatch-create-cargo");
    }

    #[On("role-created")]
    #[On("usuario-deleted")]
    #[On("user-edited")]
    #[On("user-created")]
    public function mount(){
        $this->users = User::all();
        $this->roles = Role::all();
    }

    public function render()
    {
          $query = User::query()
        ->with('roles')
        ->when($this->search, function ($q) {
            $q->where(function ($sub) {
                $sub->where('name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%");
            });
        })
        ->when($this->filterStatus, function ($q) {
            $q->where('status', $this->filterStatus);
        })
        ->when($this->filterRole, function ($q) {
            $q->whereHas('roles', function ($role) {
                $role->where('roles.id', $this->filterRole);
            });
        });

    $this->users = $query->get();
        return view('livewire.users.table');
    }
}
