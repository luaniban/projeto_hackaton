<?php

namespace App\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use TallStackUi\Traits\Interactions;

class Create extends Component
{
    use Interactions;

    public $modal = false;
    public $name, $email, $password, $status = "Ativo";
    public $roleSelected;
    public $roles;

    #[On("dispatch-create-user")]
    public function open_modal(){
        $this->modal = true;

    }

    public function close_modal(){
        $this->modal = false;
    }

      public function createUser()
    {
        $this->validate([
            "name" => "required|min:3",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6",
            "status" => "required",
        ]);

        $user = User::create([
            "name" => $this->name,
            "email" => $this->email,
            "status" => $this->status,
            "password" => bcrypt($this->password),
        ]);


        $user->roles()->attach($this->roleSelected);


        $this->reset(["name", "email", "password", "status"]);
        $this->modal = false;
        $this->toast()->success('Usuario criado com sucesso!')->send();
        $this->dispatch("user-created");
    }

    
    #[On("role-created")]
    public function mount(){
       $this->roles = Role::all();
    }
    public function render()
    {
        return view("livewire.users.create");
    }
}
