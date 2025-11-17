<?php

namespace App\Livewire\Estudantes;

use Livewire\Component;
use App\Models\Estudante;
use Livewire\Attributes\On;
use TallStackUi\Traits\Interactions;

class Delete extends Component
{
    use Interactions;

    #[On("dispatch-delete-estudante")]
    public function delete_user($id){
        Estudante::findOrFail($id)->delete();
        $this->dispatch("estudante-deleted");
        $this->toast()->success("Estudante deletado com sucesso!")->send();
    }
    
    public function render()
    {
        return view('livewire.estudantes.delete');
    }
}
