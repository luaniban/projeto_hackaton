<?php

namespace App\Livewire\Estudantes;

use App\Models\Role;
use Livewire\Component;
use App\Models\Estudante;
use Livewire\Attributes\On;
use TallStackUi\Traits\Interactions;

class Create extends Component
{
    use Interactions;

    public $modal = false;
    public $password, $nome_completo, $cpf, $data_nascimento, $celular, $email, $curso, $logadouro, $numero, $bairro, $cidade, $uf;

  

    #[On("dispatch-create-estudante")]
    public function open_modal(){
        $this->modal = true;

    }

    public function close_modal(){
        $this->modal = false;
    }

      public function createUser()
    {
       // Validação dos dados
    $this->validate([
        "nome_completo" => "required|min:3",
        "cpf" => "required|unique:estudantes,cpf",
        "data_nascimento" => "required|date",
        "celular" => "required",
        "email" => "required|email|unique:estudantes,email",
        "curso" => "required",
        "logadouro" => "required",
        "numero" => "required",
        "bairro" => "required",
        "cidade" => "required",
        "uf" => "required|max:2",
        "password" => "required|min:6", 
    ]);

    Estudante::create([
        "nome_completo" => $this->nome_completo,
        "cpf" => $this->cpf,
        "data_nascimento" => $this->data_nascimento,
        "celular" => $this->celular,
        "email" => $this->email,
        "curso" => $this->curso,
        "logradouro" => $this->logadouro,
        "numero" => $this->numero,
        "bairro" => $this->bairro,
        "cidade" => $this->cidade,
        "uf" => $this->uf,
        "password" => bcrypt($this->password),
        'role_id' => 4
    ]);



     


        $this->reset();
        $this->modal = false;
        $this->toast()->success('Estudante criado com sucesso!')->send();
        $this->dispatch("estudante-created");
    }


    
    public function render()
    {
        return view('livewire.estudantes.create');
    }
}
