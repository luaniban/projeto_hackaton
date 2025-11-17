<x-guest-layout>

    <div class="flex items-center justify-center min-h-screen px-4 bg-gray-100">

        <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-2xl">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <x-authentication-card-logo class="w-16 h-16" />
            </div>

            <!-- Título -->
            <h2 class="mb-2 text-2xl font-bold text-center text-gray-800">
                Entrar na sua conta
            </h2>

            <p class="mb-6 text-center text-gray-500">
                Preencha seus dados para continuar
            </p>

            <!-- Errors -->
            <x-validation-errors class="mb-4" />

            <!-- Status (e-mail enviado, etc) -->
            @session('status')
                <div class="mb-4 text-sm font-medium text-center text-green-600">
                    {{ $value }}
                </div>
            @endsession

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <x-label for="email" value="Email" />
                    <x-input id="email"
                        class="w-full mt-1"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="seuemail@gmail.com"
                    />
                </div>

                <!-- Password -->
                <div>
                    <x-label for="password" value="Senha" />
                    <x-input id="password"
                        class="w-full mt-1"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Digite sua senha"
                    />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mt-3">
                    <label class="flex items-center text-sm text-gray-600">
                        <x-checkbox id="remember_me" name="remember" class="mr-2" />
                        Lembrar de mim
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-blue-600 hover:underline">
                            Esqueceu a senha?
                        </a>
                    @endif
                </div>

                <!-- Button -->
                <button
                    class="w-full py-2 mt-4 font-semibold text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                    Entrar
                </button>
            </form>

            <!-- Footer -->
            <p class="mt-6 text-sm text-center text-gray-500">
                Sistema interno — SEDUC
            </p>
        </div>

    </div>

</x-guest-layout>
