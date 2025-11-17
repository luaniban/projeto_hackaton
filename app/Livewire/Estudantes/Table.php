<?php

namespace App\Livewire\Estudantes;

use Livewire\Component;
use App\Models\Estudante;
use Livewire\Attributes\On;

class Table extends Component
{
    public $estudantes;
    public $search = '';
    public $filterStatus = '';
    public $filterRole = '';
    public $roles;

    public function dispatch_create(){
        $this->dispatch("dispatch-create-estudante");
    }

    public function dispatch_edit($id){
        $this->dispatch("dispatch-edit-estudante", $id);
    }

    public function dispatch_delete($id){
        $this->dispatch("dispatch-delete-estudante", $id);
    }

   

    #[On("estudante-deleted")]
    #[On("estudante-edited")]
    #[On("estudante-created")]
    public function mount(){
        $this->estudantes = Estudante::all();    
    
    }



    public function render()
    {
        return view('livewire.estudantes.table');
    }
}
