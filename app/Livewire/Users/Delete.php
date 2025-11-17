<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use TallStackUi\Traits\Interactions;

class Delete extends Component
{
    use Interactions;


    #[On("dispatch-delete-user")]
    public function delete_user($id){
        User::findOrFail($id)->delete();
        $this->dispatch("usuario-deleted");
        $this->toast()->success("Usuario deletado com sucesso!")->send();
    }
    public function render()
    {
        return view('livewire.users.delete');
    }
}
