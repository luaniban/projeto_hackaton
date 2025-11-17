<div>
    <x-ts-modal title="Criar Estudante"  wire>

        <div class="space-y-4">

            <div>
                <x-ts-input
                    label="Nome completo"   
                    placeholder="Digite o nome completo"
                    wire:model.defer="nome_completo"
                />
            </div>

            <div>
                <x-ts-input
                    label="CPF"
                    placeholder="Digite o CPF"
                    wire:model.defer="cpf"
                />
            </div>

            <div>
                <x-ts-input
                    label="Data de Nascimento"
                    type="date"
                    wire:model.defer="data_nascimento"
                />
            </div>

            <div>
                <x-ts-input
                    label="Celular"
                    placeholder="Digite o número do celular"
                    wire:model.defer="celular"
                />
            </div>

            <div>
                <x-ts-input
                    label="Email"
                    type="email"
                    placeholder="exemplo@email.com"
                    wire:model.defer="email"
                />
            </div>

            <div>
                <x-ts-input
                    label="Curso"
                    placeholder="Digite o curso"
                    wire:model.defer="curso"
                />
            </div>

            <div>
                <x-ts-input
                    label="Logradouro"
                    placeholder="Digite o logradouro"
                    wire:model.defer="logadouro"
                />
            </div>

            <div>
                <x-ts-input
                    label="Número"
                    placeholder="Digite o número"
                    wire:model.defer="numero"
                />
            </div>

            <div>
                <x-ts-input
                    label="Bairro"
                    placeholder="Digite o bairro"
                    wire:model.defer="bairro"
                />
            </div>

            <div>
                <x-ts-input
                    label="Cidade"
                    placeholder="Digite a cidade"
                    wire:model.defer="cidade"
                />
            </div>

            <div>
                <x-ts-input
                    label="UF"
                    placeholder="Digite a UF"
                    wire:model.defer="uf"
                />
            </div>

            <div>
                <x-ts-input
                    label="Senha"
                    type="password"
                    wire:model.defer="password"
                    placeholder="Digite uma senha"
                />
            </div>

        </div>

        <x-slot name="footer">
            <x-ts-button color="red" wire:click="close_modal">Cancelar</x-ts-button>
            <x-ts-button color="blue" icon="user-plus" wire:click="createUser">Criar Estudante</x-ts-button>
        </x-slot>

    </x-ts-modal>
</div>
