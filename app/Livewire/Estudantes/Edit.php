<?php

namespace App\Livewire\Estudantes;


use Livewire\Component;
use App\Models\Estudante;
use Livewire\Attributes\On;
use TallStackUi\Traits\Interactions;

class Edit extends Component
{
    use Interactions;

    public $modal = false;
    public $name;
    public $status;
    public $password, $nome_completo, $cpf, $data_nascimento, $celular, $email, $curso, $logradouro, $numero, $bairro, $cidade, $uf;
    public $estudanteID;
   
    public function close_modal(){
        $this->modal = false;
    }

    #[On("dispatch-edit-estudante")]
    public function openEdit($id)
    {
        $estudante = Estudante::findOrFail($id);
    
        $this->estudanteID = $estudante->id;
        $this->nome_completo = $estudante->nome_completo;
        $this->cpf = $estudante->cpf;
        $this->data_nascimento = $estudante->data_nascimento;
        $this->celular = $estudante->celular;
        $this->email = $estudante->email;
        $this->curso = $estudante->curso;
        $this->logradouro = $estudante->logradouro;
        $this->numero = $estudante->numero;
        $this->bairro = $estudante->bairro;
        $this->cidade = $estudante->cidade;
        $this->uf = $estudante->uf;
    
        $this->modal = true;
    }

    public function update()
    {


        $this->validate([
            "nome_completo" => "required|min:3",
            "cpf" => "required",
            "data_nascimento" => "required|date",
            "celular" => "required",
            "email" => "required|email",
            "curso" => "required",
            "logradouro" => "required",
            "numero" => "required",
            "bairro" => "required",
            "cidade" => "required",
            "uf" => "required|max:2",
            
        ]);

        $estudante = Estudante::findOrFail($this->estudanteID);

        $estudante->update([
            "nome_completo" => $this->nome_completo,
            "cpf" => $this->cpf,
            "data_nascimento" => $this->data_nascimento,
            "celular" => $this->celular,
            "email" => $this->email,
            "curso" => $this->curso,
            "logradouro" => $this->logradouro,
            "numero" => $this->numero,
            "bairro" => $this->bairro,
            "cidade" => $this->cidade,
            "uf" => $this->uf,
        ]);


    
        $this->dispatch("estudante-edited");
        $this->modal = false;
        $this->toast()->success("Estudante editado com sucesso!")->send();

    }

    public function render()
    {
        return view("livewire.estudantes.edit");
    }
}
