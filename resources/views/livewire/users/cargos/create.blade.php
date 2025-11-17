<div>
    <x-ts-modal title="Criar Cargo" wire>

        <div class="space-y-4">
            <div>
                <x-ts-input
                    label="Nome do cargo"
                    placeholder="Digite o nome do cargo"
                    wire:model.defer="name"
                />
            </div>

        </div>

        <x-slot name="footer">
            <x-ts-button color="red" wire:click="close_modal">
                Cancelar
            </x-ts-button>

            <x-ts-button color="blue" icon="plus" wire:click="createRole">
                Criar Cargo
            </x-ts-button>
        </x-slot>

    </x-ts-modal>
</div>
