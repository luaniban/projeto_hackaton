<div x-data="{
    step: 1,
    totalSteps: 5,
    goTo(next) {
        if (next >= 1 && next <= this.totalSteps) this.step = next
    }
}" class="min-h-screen bg-slate-950 text-slate-100">
<div class="max-w-[1700px] mx-auto px-4 py-10 md:py-12">
    {{-- Cabeçalho --}}
    <div class="mb-8">
        <p class="text-xs font-medium tracking-[0.2em] text-sky-400 uppercase">
            Área do estudante
        </p>
        <h1 class="mt-2 text-2xl md:text-3xl font-semibold tracking-tight">
            Cadastro para o transporte universitário
        </h1>
        <p class="mt-2 text-sm text-slate-400 max-w-2xl">
            Preencha seus dados com atenção. Você poderá acompanhar o andamento da inscrição depois na área
            <span class="text-sky-400">“Minha inscrição”</span>.
        </p>
    </div>

    {{-- Stepper --}}
    <div class="mb-6 rounded-2xl border border-slate-800 bg-slate-900/60 p-4 shadow-lg shadow-slate-950/50">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            {{-- Bolinhas / etapas --}}
            <ol class="flex flex-wrap gap-3 text-[11px] font-medium">
                <template x-for="(label, index) in [
                    'Dados pessoais',
                    'Endereço',
                    'Dados acadêmicos',
                    'Informações de bolsa',
                    'Termo e confirmação'
                ]" :key="index">
                    <li class="flex items-center gap-2">
                        <button type="button" class="flex items-center gap-2 group" @click="goTo(index + 1)">
                            <div class="flex h-6 w-6 items-center justify-center rounded-full border text-[11px] font-semibold transition"
                                :class="{
                                    'bg-emerald-400 text-slate-950 border-emerald-400': step > index + 1,
                                    'bg-sky-500 text-slate-950 border-sky-400': step === index + 1,
                                    'border-slate-600 text-slate-400 bg-slate-900': step < index + 1
                                }">
                                <span x-text="index + 1"></span>
                            </div>
                            <span class="transition" :class="{
                                    'text-sky-200': step === index + 1,
                                    'text-slate-300': step > index + 1,
                                    'text-slate-500': step < index + 1
                                }" x-text="label"></span>
                        </button>

                        <span x-show="index < totalSteps - 1"
                            class="hidden md:inline-block h-px w-6 bg-gradient-to-r from-slate-600/60 via-slate-700 to-slate-800"></span>
                    </li>
                </template>
            </ol>

            {{-- Indicador de progresso --}}
            <div class="w-full md:w-44">
                <div class="flex items-center justify-between text-[11px] text-slate-400 mb-1">
                    <span>Progresso</span>
                    <span class="font-semibold text-sky-200"
                        x-text="`${Math.round((step / totalSteps) * 100)}%`"></span>
                </div>
                <div class="h-1.5 w-full overflow-hidden rounded-full bg-slate-800">
                    <div class="h-1.5 rounded-full bg-gradient-to-r from-sky-400 via-cyan-400 to-emerald-400 transition-all duration-300"
                        :style="`width: ${(step / totalSteps) * 100}%`"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- FORM --}}
    <form action="#" method="POST" class="space-y-6">
        @csrf

        {{-- STEP 1: DADOS PESSOAIS --}}
        <section x-show="step === 1" x-transition.opacity.scale.origin.top
            class="rounded-2xl border border-slate-800 bg-slate-900/60 p-5 md:p-6 shadow-xl shadow-slate-950/40">
            <h2 class="text-sm font-semibold">
                1. Dados pessoais
            </h2>
            <p class="mt-1 text-xs text-slate-400">
                Informe seus dados de identificação. Eles serão utilizados para validação e comunicação.
            </p>

            <div class="mt-4 grid gap-4 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Nome completo
                    </label>
                    <input type="text" name="nome_completo"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="Digite seu nome completo">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        CPF
                    </label>
                    <input type="text" name="cpf"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="000.000.000-00">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        RG
                    </label>
                    <input type="text" name="rg"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="00.000.000-0">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Data de nascimento
                    </label>
                    <input type="date" name="data_nascimento"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Sexo
                    </label>
                    <select name="sexo"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                        <option value="" class="bg-slate-900">Selecione</option>
                        <option value="feminino" class="bg-slate-900">Feminino</option>
                        <option value="masculino" class="bg-slate-900">Masculino</option>
                        <option value="outro" class="bg-slate-900">Outro / Prefiro não informar</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Nome da mãe
                    </label>
                    <input type="text" name="nome_mae"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="Digite o nome completo">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Nome do pai
                    </label>
                    <input type="text" name="nome_pai"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="Digite o nome completo">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Telefone
                    </label>
                    <input type="text" name="telefone"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="(12) 0000-0000">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Celular
                    </label>
                    <input type="text" name="celular"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="(12) 90000-0000">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        E-mail
                    </label>
                    <input type="email" name="email"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="seuemail@exemplo.com">
                </div>
            </div>
        </section>

        {{-- STEP 2: ENDEREÇO --}}
        <section x-show="step === 2" x-transition.opacity.scale.origin.top
            class="rounded-2xl border border-slate-800 bg-slate-900/60 p-5 md:p-6 shadow-xl shadow-slate-950/40">
            <h2 class="text-sm font-semibold">
                2. Endereço
            </h2>
            <p class="mt-1 text-xs text-slate-400">
                Informe o endereço completo, pois ele será considerado na organização das linhas.
            </p>

            <div class="mt-4 grid gap-4 md:grid-cols-6">
                <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        CEP
                    </label>
                    <input type="text" name="cep"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="00000-000">
                </div>

                <div class="md:col-span-4">
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Logradouro
                    </label>
                    <input type="text" name="logradouro"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="Rua, avenida, travessa...">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Número
                    </label>
                    <input type="text" name="numero"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="000">
                </div>

                <div class="md:col-span-4">
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Complemento
                    </label>
                    <input type="text" name="complemento"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="Apartamento, bloco, ponto de referência (opcional)">
                </div>

                <div class="md:col-span-3">
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Bairro
                    </label>
                    <input type="text" name="bairro"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="Digite o bairro">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Cidade
                    </label>
                    <input type="text" name="cidade"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        value="Caraguatatuba">
                </div>

                <div class="md:col-span-1">
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        UF
                    </label>
                    <select name="uf"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                        <option value="SP" class="bg-slate-900">SP</option>
                        {{-- outros estados se quiser --}}
                    </select>
                </div>

                <div class="md:col-span-3">
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Tipo de residência
                    </label>
                    <select name="tipo_residencia"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                        <option value="" class="bg-slate-900">Selecione</option>
                        <option value="propria" class="bg-slate-900">Própria</option>
                        <option value="aluguel" class="bg-slate-900">Aluguel</option>
                        <option value="cedida" class="bg-slate-900">Cedida</option>
                        <option value="outro" class="bg-slate-900">Outro</option>
                    </select>
                </div>
            </div>
        </section>

        {{-- STEP 3: DADOS ACADÊMICOS --}}
        <section x-show="step === 3" x-transition.opacity.scale.origin.top
            class="rounded-2xl border border-slate-800 bg-slate-900/60 p-5 md:p-6 shadow-xl shadow-slate-950/40">
            <h2 class="text-sm font-semibold">
                3. Dados acadêmicos
            </h2>
            <p class="mt-1 text-xs text-slate-400">
                Informe em qual instituição você estuda e como é a sua rotina de aulas.
            </p>

            <div class="mt-4 grid gap-4 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Instituição de ensino
                    </label>
                    <select name="instituicao_id"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                        <option value="" class="bg-slate-900">Selecione</option>
                        <option value="1" class="bg-slate-900">IFSP - Campus Caraguatatuba</option>
                        <option value="2" class="bg-slate-900">FATEC - São Sebastião</option>
                        <option value="3" class="bg-slate-900">UNIMÓDULO</option>
                        {{-- depois isso vem do banco --}}
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Curso
                    </label>
                    <input type="text" name="curso"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="Ex.: Análise e Desenvolvimento de Sistemas">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Período
                    </label>
                    <select name="periodo"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                        <option value="" class="bg-slate-900">Selecione</option>
                        <option value="matutino" class="bg-slate-900">Matutino</option>
                        <option value="vespertino" class="bg-slate-900">Vespertino</option>
                        <option value="noturno" class="bg-slate-900">Noturno</option>
                        <option value="integral" class="bg-slate-900">Integral</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Semestre / série
                    </label>
                    <input type="text" name="semestre_serie"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="Ex.: 3º semestre">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Horário de início das aulas
                    </label>
                    <input type="time" name="horario_inicio_aula"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Horário de término das aulas
                    </label>
                    <input type="time" name="horario_fim_aula"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                </div>
            </div>
        </section>

        {{-- STEP 4: BOLSA --}}
        <section x-show="step === 4" x-transition.opacity.scale.origin.top
            class="rounded-2xl border border-slate-800 bg-slate-900/60 p-5 md:p-6 shadow-xl shadow-slate-950/40">
            <h2 class="text-sm font-semibold">
                4. Informações de bolsa
            </h2>
            <p class="mt-1 text-xs text-slate-400">
                Informe se você possui algum tipo de bolsa de estudos ou financiamento.
            </p>

            <div class="mt-4 grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Possui bolsa ou financiamento?
                    </label>
                    <select name="possui_bolsa"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                        <option value="" class="bg-slate-900">Selecione</option>
                        <option value="nao" class="bg-slate-900">Não possuo</option>
                        <option value="bolsa" class="bg-slate-900">Bolsa</option>
                        <option value="financiamento" class="bg-slate-900">Financiamento (FIES, etc.)</option>
                        <option value="bolsa_financiamento" class="bg-slate-900">Bolsa + Financiamento</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Tipo de bolsa / programa
                    </label>
                    <input type="text" name="tipo_bolsa"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="Ex.: ProUni, Bolsa institucional, etc.">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Percentual de bolsa (se houver)
                    </label>
                    <input type="number" name="percentual_bolsa" min="0" max="100"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="Ex.: 50">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-slate-200 mb-1.5">
                        Observações (opcional)
                    </label>
                    <textarea name="observacoes_bolsa" rows="3"
                        class="w-full rounded-xl border border-slate-700 bg-slate-900/80 px-3 py-2.5 text-sm text-slate-100 placeholder:text-slate-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500"
                        placeholder="Ex.: Se a bolsa for temporária, condições específicas, etc."></textarea>
                </div>
            </div>
        </section>

        {{-- STEP 5: TERMO E CONFIRMAÇÃO --}}
        <section x-show="step === 5" x-transition.opacity.scale.origin.top
            class="rounded-2xl border border-slate-800 bg-slate-900/60 p-5 md:p-6 shadow-xl shadow-slate-950/40">
            <h2 class="text-sm font-semibold">
                5. Termo de responsabilidade e confirmação
            </h2>
            <p class="mt-1 text-xs text-slate-400">
                Leia com atenção o termo abaixo e confirme seus dados para concluir o cadastro.
            </p>

            <div class="mt-4 space-y-4 text-xs">
                <div class="rounded-xl border border-slate-800 bg-slate-950/80 px-4 py-3 max-h-52 overflow-y-auto">
                    <p class="text-[11px] text-slate-300 mb-2 font-semibold">
                        Termo de responsabilidade do transporte universitário
                    </p>
                    <p class="text-[11px] text-slate-400 leading-relaxed">
                        Ao me inscrever no programa de transporte universitário da Prefeitura Municipal,
                        declaro estar ciente de que:
                    </p>
                    <ul class="mt-2 ml-4 list-disc space-y-1 text-[11px] text-slate-400">
                        <li>As informações prestadas neste formulário são verdadeiras e de minha inteira
                            responsabilidade;</li>
                        <li>O uso indevido do transporte poderá resultar no cancelamento da vaga, conforme critérios
                            estabelecidos em decreto;</li>
                        <li>Comprometo-me a comunicar qualquer alteração de endereço, instituição de ensino ou
                            horário de aulas;</li>
                        <li>A assiduidade será monitorada e poderá ser utilizada como critério de permanência no
                            programa;</li>
                        <li>Estou ciente de que o preenchimento do cadastro não garante, por si só, a concessão da
                            vaga.</li>
                    </ul>
                    <p class="mt-3 text-[11px] text-slate-400">
                        Declaro ainda estar de acordo com o tratamento dos meus dados pessoais para fins de
                        análise, controle e gestão do transporte universitário, em conformidade com a legislação
                        vigente.
                    </p>
                </div>

                <div class="flex items-start gap-2">
                    <input type="checkbox" id="aceite_termo" name="aceite_termo"
                        class="mt-0.5 h-4 w-4 rounded border-slate-600 bg-slate-900 text-sky-500 focus:ring-sky-500">
                    <label for="aceite_termo" class="text-[11px] text-slate-300">
                        Declaro que li e concordo com os termos acima e autorizo o uso dos meus dados
                        para fins de análise e participação no programa de transporte universitário.
                    </label>
                </div>

                <div
                    class="rounded-xl border border-slate-800 bg-slate-950/80 px-4 py-3 text-[11px] text-slate-400 flex flex-col gap-1 md:flex-row md:items-center md:justify-between">
                    <div>
                        <span class="text-slate-500">Resumo rápido:</span>
                        <span class="ml-1 text-sky-200 font-medium">
                            Você está prestes a enviar seu cadastro para análise.
                        </span>
                    </div>
                    <div class="mt-2 md:mt-0">
                        <span class="text-slate-500">Envio em:</span>
                        <span class="ml-1 font-mono text-slate-200">
                            {{ now()->format('d/m/Y H:i') }}
                        </span>
                        {{-- depois você troca pelo horário real da submissão se quiser --}}
                    </div>
                </div>
            </div>
        </section>

        {{-- Navegação entre passos --}}
        <div class="flex items-center justify-between pt-2">
            <button type="button" @click="goTo(step - 1)" x-show="step > 1"
                class="inline-flex items-center gap-2 rounded-xl border border-slate-700 bg-slate-900/80 px-4 py-2 text-xs font-medium text-slate-200 hover:bg-slate-800/80 transition">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6" />
                </svg>
                Voltar
            </button>

            <div class="ml-auto flex items-center gap-3">
                <button type="button" x-show="step < totalSteps" @click="goTo(step + 1)"
                    class="inline-flex items-center gap-2 rounded-xl bg-sky-500 px-5 py-2.5 text-xs font-semibold text-slate-950 shadow-lg shadow-sky-900/50 hover:bg-sky-400 transition">
                    Próxima etapa
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </button>

                <button type="submit" x-show="step === totalSteps"
                    class="inline-flex items-center gap-2 rounded-xl bg-emerald-500 px-5 py-2.5 text-xs font-semibold text-slate-950 shadow-lg shadow-emerald-900/50 hover:bg-emerald-400 transition">
                    Enviar cadastro para análise
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </form>
</div>
</div>