<div>
       <livewire:users.create/>
        <livewire:users.edit/>
        <livewire:users.delete/>
        <livewire:users.cargos.create/>
    <div class="flex items-center justify-between mb-6">

    <h1 class="text-3xl font-semibold text-gray-800">Lista de Usuários</h1>

    <div class="flex items-center gap-4">
        <!-- Filtro: Buscar -->
        <div>
            <x-ts-input
                icon="magnifying-glass"
                placeholder="Pesquisar..."
                wire:model.live="search"
                class=""
            />
        </div>

        <!-- Filtro: Status -->
        <div>
            <x-ts-select.native wire:model.live="filterStatus" class="pl-4 pr-8">
                <option value="">Todos status</option>
                <option value="Ativo">Ativo</option>
                <option value="Inativo">Inativo</option>
            </x-ts-select.native>
        </div>

        <!-- Filtro: Cargo -->
        <div>
            <x-ts-select.native wire:model.live="filterRole" class="pl-4 pr-8">
                <option value="">Todos cargos</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </x-ts-select.native>
        </div>

        <!-- Botões -->
        <button
            wire:click="dispatch_create"
            class="px-5 py-2.5 bg-blue-600 text-white font-semibold rounded-xl shadow-md
                   hover:bg-blue-700 active:scale-95 transition-all duration-200 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            Criar Usuário
        </button>

        <button
            wire:click="dispatch_create_cargo"
            class="px-5 py-2.5 bg-emerald-600 text-white font-semibold rounded-xl shadow-md
                   hover:bg-emerald-700 active:scale-95 transition-all duration-200 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            Criar Cargo
        </button>

    </div>

</div>


    <div class="overflow-hidden border border-gray-200 rounded-lg">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 font-medium text-gray-700">ID</th>
                    <th class="px-6 py-3 font-medium text-gray-700">Nome</th>
                    <th class="px-6 py-3 font-medium text-gray-700">Email</th>
                    <th class="px-6 py-3 font-medium text-gray-700">Cargo</th>
                    <th class="px-6 py-3 font-medium text-gray-700">Status</th>
                    <th class="px-6 py-3 font-medium text-right text-gray-700">Ações</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)

                    <tr class="transition hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-800">{{$user->id}}</td>
                        <td class="px-6 py-4 text-gray-800">{{$user->name}}</td>
                        <td class="px-6 py-4 text-gray-600">{{$user->email}}</td>
                        <td class="px-6 py-4 text-gray-800"> {{ $user->roles->first()->name ?? 'Sem função' }}</td>
                        <td class="px-6 py-4">
                          <span class="px-3 py-1 text-sm rounded-full
                            {{ $user->status === 'Ativo'
                                ? 'text-green-700 bg-green-100'
                                : 'text-red-700 bg-red-100'
                            }}">
                            {{ $user->status }}
                        </span>
                        </td>
                        <td class="px-6 py-4 space-x-3 text-right">
                            <x-ts-button.circle color="blue"  wire:click="dispatch_edit({{$user->id}})" icon="pencil-square" outline></x-ts-button.circle>
                            <x-ts-button.circle color="red" wire:click="dispatch_delete({{$user->id}})" icon="trash" outline>Excluir</x-ts-button.circle>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>
