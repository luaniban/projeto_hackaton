<?php

namespace App\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use TallStackUi\Traits\Interactions;

class Edit extends Component
{
    use Interactions;

    public $modal = false;
    public $userId;
    public $name;
    public $email;
    public $status;
    public $roleSelected;
    public $roles;

    #[On("role-created")]
    public function mount()
    {
        $this->roles = Role::all();
    }
    public function close_modal(){
        $this->modal = false;
    }

    #[On("dispatch-edit-user")]
    public function openEdit($id)
    {
        $user = User::findOrFail($id);

        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->status = $user->status;


        $this->roleSelected = $user->roles->first()->id;

        $this->modal = true;
    }

    public function update()
    {


        $this->validate([
            "name" => "required|min:3",
            "email" => "required|email",
            "status" => "required"
        ]);

        $user = User::findOrFail($this->userId);

        $user->update([
            "name" => $this->name,
            "email" => $this->email,
            "status" => $this->status
        ]);


        $user->roles()->sync($this->roleSelected);
        $this->dispatch("user-edited");
        $this->modal = false;
        $this->toast()->success("Usuario editado com sucesso!")->send();

    }

    public function render()
    {
        return view("livewire.users.edit");
    }
}
