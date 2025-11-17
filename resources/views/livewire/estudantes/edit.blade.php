<div>
    <x-ts-modal title="Editar Estudante" size="4xl" wire>

        <div class="space-y-4">

           
            <x-ts-input
                label="Nome completo"
                placeholder="Digite o nome do estudante"
                wire:model.defer="nome_completo"
            />

           
            <x-ts-input
                label="CPF"
                placeholder="Digite o CPF"
                wire:model.defer="cpf"
            />

        
            <x-ts-input
                label="Data de Nascimento"
                type="date"
                wire:model.defer="data_nascimento"
            />

           
            <x-ts-input
                label="Celular"
                placeholder="Digite o celular"
                wire:model.defer="celular"
            />

         
            <x-ts-input
                label="Email"
                type="email"
                placeholder="exemplo@email.com"
                wire:model.defer="email"
            />

            
            <x-ts-input
                label="Curso"
                placeholder="Digite o curso"
                wire:model.defer="curso"
            />

        
            <x-ts-input
                label="Logradouro"
                placeholder="Rua / Avenida"
                wire:model.defer="logradouro"
            />
            <x-ts-input
                label="Número"
                placeholder="Número da residência"
                wire:model.defer="numero"
            />
            <x-ts-input
                label="Bairro"
                placeholder="Bairro"
                wire:model.defer="bairro"
            />
            <x-ts-input
                label="Cidade"
                placeholder="Cidade"
                wire:model.defer="cidade"
            />
            <x-ts-input
                label="UF"
                placeholder="UF"
                wire:model.defer="uf"
            />
        </div>

        <x-slot name="footer">
            <x-ts-button color="red" wire:click="close_modal">Cancelar</x-ts-button>
            <x-ts-button color="blue" icon="pencil" wire:click="update">
                Salvar Alterações
            </x-ts-button>
        </x-slot>

    </x-ts-modal>
</div>
