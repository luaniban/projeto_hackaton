    <div>
        <x-ts-modal  title="Criar Usuário" wire>

            <div class="space-y-4">


                <div>
                    <x-ts-input
                        label="Nome completo"
                        placeholder="Digite o nome do usuário"
                        wire:model.defer="name"
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
                    <x-ts-select.native
                        label="Status"
                        wire:model.defer="status"
                        class="px-2"
                    >
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    </x-ts-select.native>
                </div>

                <div>
                    <x-ts-input
                        label="Senha"
                        type="password"
                        wire:model.defer="password"
                        placeholder="Digite uma senha"
                    />
                </div>

                <div>
                    <x-ts-select.native
                        label="Funções (Roles)"
                        wire:model.defer="roleSelected"
                        placeholder="Selecione os papéis"
                        class="px-2"
                    >
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                </x-ts-select.native>
                </div>

            </div>

            <x-slot name="footer">
            <x-ts-button color="red" wire:click="close_modal">Cancelar</x-ts-button>
            <x-ts-button color="blue" icon="user-plus" wire:click="createUser">Criar Usuario</x-ts-button>
            </x-slot>

        </x-ts-modal>
    </div>
