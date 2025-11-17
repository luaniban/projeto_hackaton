<x-app-layout>
{{-- resources/views/admin/dashboard.blade.php --}}
{{-- Se usar layout próprio, envolve isso em <x-app-layout> ou @extends --}}
    <div class="min-h-screen bg-slate-950 text-slate-100">
        <div class="max-w-7xl mx-auto px-4 py-8 md:py-10">
            {{-- Cabeçalho --}}
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs font-medium tracking-[0.2em] text-sky-400 uppercase">
                        Painel do gestor
                    </p>
                    <h1 class="mt-1 text-2xl md:text-3xl font-semibold tracking-tight">
                        Visão geral do transporte universitário
                    </h1>
                    <p class="mt-2 text-sm text-slate-400 max-w-2xl">
                        Acompanhe as inscrições, a ocupação das linhas e a assiduidade dos estudantes em tempo real.
                    </p>
                </div>
    
                <div class="flex flex-col items-start gap-2 text-xs text-slate-400 md:items-end">
                    <div class="inline-flex items-center gap-2 rounded-full border border-emerald-500/40 bg-emerald-500/10 px-3 py-1.5 text-[11px] font-medium text-emerald-100 shadow-sm shadow-emerald-900/50">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        SIGTU • Ambiente gestor
                    </div>
                    <p>
                        Hoje é <span class="text-slate-100 font-medium">{{ now()->format('d/m/Y') }}</span>
                        • Atualizado às <span class="text-slate-100 font-medium">{{ now()->format('H:i') }}</span>
                    </p>
                </div>
            </div>
    
            {{-- Cards de estatísticas principais --}}
            <section class="mt-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                {{-- Total estudantes --}}
                <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-4 shadow-xl shadow-slate-950/50">
                    <div class="flex items-center justify-between gap-2">
                        <div>
                            <p class="text-[11px] font-medium uppercase tracking-[0.18em] text-slate-400">
                                Estudantes cadastrados
                            </p>
                            <p class="mt-2 text-2xl font-semibold leading-none">
                                {{-- exemplo estático, depois trocar por variável --}}
                                842
                            </p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-800/80">
                            <svg class="h-5 w-5 text-sky-300" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M18 20a6 6 0 0 0-12 0" />
                                <circle cx="12" cy="10" r="3" />
                                <circle cx="12" cy="12" r="10" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-2 text-[11px] text-slate-500">
                        Inclui estudantes em análise, aprovados e reprovados.
                    </p>
                </div>
    
                {{-- Aprovados --}}
                <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-4 shadow-xl shadow-slate-950/50">
                    <div class="flex items-center justify-between gap-2">
                        <div>
                            <p class="text-[11px] font-medium uppercase tracking-[0.18em] text-slate-400">
                                Estudantes com vaga aprovada
                            </p>
                            <p class="mt-2 text-2xl font-semibold leading-none">
                                612
                            </p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/10 border border-emerald-500/40">
                            <svg class="h-5 w-5 text-emerald-300" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M9 11l3 3L22 4" />
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-2 flex items-center justify-between text-[11px]">
                        <p class="text-slate-500">
                            Taxa de aprovação:
                            <span class="font-semibold text-emerald-300">72,7%</span>
                        </p>
                        <span class="inline-flex items-center gap-1 rounded-full bg-emerald-500/10 px-2.5 py-1 text-[10px] font-medium text-emerald-200 border border-emerald-500/40">
                            Estáveis
                        </span>
                    </div>
                </div>
    
                {{-- Ocupação média das linhas --}}
                <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-4 shadow-xl shadow-slate-950/50">
                    <div class="flex items-center justify-between gap-2">
                        <div>
                            <p class="text-[11px] font-medium uppercase tracking-[0.18em] text-slate-400">
                                Ocupação média das linhas
                            </p>
                            <p class="mt-2 text-2xl font-semibold leading-none">
                                81%
                            </p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-500/10 border border-sky-500/40">
                            <svg class="h-5 w-5 text-sky-300" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M3 3v18h18" />
                                <path d="M7 15l3.5-4L14 15l4.5-6" />
                                <path d="M16 9h3" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-2 text-[11px] text-slate-500">
                        Considerando capacidade máxima dos veículos cadastrados.
                    </p>
                </div>
    
                {{-- Presença de hoje --}}
                <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-4 shadow-xl shadow-slate-950/50">
                    <div class="flex items-center justify-between gap-2">
                        <div>
                            <p class="text-[11px] font-medium uppercase tracking-[0.18em] text-slate-400">
                                Taxa de presença (hoje)
                            </p>
                            <p class="mt-2 text-2xl font-semibold leading-none">
                                89%
                            </p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-500/10 border border-amber-400/40">
                            <svg class="h-5 w-5 text-amber-300" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 7v5" />
                                <path d="M12 16h.01" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-2 text-[11px] text-slate-500">
                        Inclui apenas viagens concluídas no dia de hoje.
                    </p>
                </div>
            </section>
    
            {{-- Meio: Linhas + Viagens de hoje --}}
            <section class="mt-8 grid gap-6 lg:grid-cols-[minmax(0,1.4fr)_minmax(0,1fr)]">
                {{-- Card linhas --}}
                <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-5 md:p-6 shadow-xl shadow-slate-950/50">
                    <div class="flex items-center justify-between gap-3 mb-4">
                        <div>
                            <h2 class="text-sm font-semibold">
                                Linhas de transporte
                            </h2>
                            <p class="mt-1 text-xs text-slate-400">
                                Visão rápida da ocupação das principais linhas ativas.
                            </p>
                        </div>
    
                        <a 
                           class="text-[11px] font-medium text-sky-300 hover:text-sky-200">
                            Gerenciar linhas
                        </a>
                    </div>
    
                    <div class="space-y-3 text-xs">
                        {{-- Exemplo de linha – depois trocar por @foreach --}}
                        <div class="flex items-center gap-3 rounded-xl border border-slate-800 bg-slate-950/70 px-3.5 py-3">
                            <div class="min-w-0 flex-1">
                                <p class="text-[12px] font-semibold text-slate-100 truncate">
                                    Linha Norte – IFSP / UNIMÓDULO
                                </p>
                                <p class="mt-0.5 text-[11px] text-slate-400">
                                    Capacidade: 48 vagas • Ocupadas: 44
                                </p>
                                <div class="mt-2 h-1.5 w-full rounded-full bg-slate-800 overflow-hidden">
                                    <div class="h-1.5 w-[92%] rounded-full bg-gradient-to-r from-emerald-400 via-amber-300 to-rose-400"></div>
                                </div>
                            </div>
                            <div class="flex flex-col items-end gap-1">
                                <span class="text-[11px] font-semibold text-emerald-300">
                                    92% ocupação
                                </span>
                                <span class="inline-flex items-center gap-1 rounded-full bg-amber-500/10 px-2 py-0.5 text-[10px] font-medium text-amber-200 border border-amber-400/40">
                                    Quase lotada
                                </span>
                            </div>
                        </div>
    
                        <div class="flex items-center gap-3 rounded-xl border border-slate-800 bg-slate-950/70 px-3.5 py-3">
                            <div class="min-w-0 flex-1">
                                <p class="text-[12px] font-semibold text-slate-100 truncate">
                                    Linha Sul – FATEC / IFSP
                                </p>
                                <p class="mt-0.5 text-[11px] text-slate-400">
                                    Capacidade: 42 vagas • Ocupadas: 31
                                </p>
                                <div class="mt-2 h-1.5 w-full rounded-full bg-slate-800 overflow-hidden">
                                    <div class="h-1.5 w-[74%] rounded-full bg-gradient-to-r from-sky-400 to-emerald-400"></div>
                                </div>
                            </div>
                            <div class="flex flex-col items-end gap-1">
                                <span class="text-[11px] font-semibold text-sky-300">
                                    74% ocupação
                                </span>
                                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-500/10 px-2 py-0.5 text-[10px] font-medium text-emerald-200 border border-emerald-500/40">
                                    Dentro do ideal
                                </span>
                            </div>
                        </div>
    
                        <div class="flex items-center gap-3 rounded-xl border border-slate-800 bg-slate-950/70 px-3.5 py-3">
                            <div class="min-w-0 flex-1">
                                <p class="text-[12px] font-semibold text-slate-100 truncate">
                                    Linha Centro – UNIMÓDULO
                                </p>
                                <p class="mt-0.5 text-[11px] text-slate-400">
                                    Capacidade: 40 vagas • Ocupadas: 19
                                </p>
                                <div class="mt-2 h-1.5 w-full rounded-full bg-slate-800 overflow-hidden">
                                    <div class="h-1.5 w-[48%] rounded-full bg-gradient-to-r from-sky-400 to-slate-500"></div>
                                </div>
                            </div>
                            <div class="flex flex-col items-end gap-1">
                                <span class="text-[11px] font-semibold text-slate-200">
                                    48% ocupação
                                </span>
                                <span class="inline-flex items-center gap-1 rounded-full bg-slate-800 px-2 py-0.5 text-[10px] font-medium text-slate-300 border border-slate-700">
                                    Vagas disponíveis
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
    
                {{-- Card viagens de hoje --}}
                <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-5 md:p-6 shadow-xl shadow-slate-950/50">
                    <div class="flex items-center justify-between gap-3 mb-4">
                        <div>
                            <h2 class="text-sm font-semibold">
                                Viagens de hoje
                            </h2>
                            <p class="mt-1 text-xs text-slate-400">
                                Acompanhe o status das saídas programadas para o dia.
                            </p>
                        </div>
                        <a 
                           class="text-[11px] font-medium text-sky-300 hover:text-sky-200">
                            Ver todas
                        </a>
                    </div>
    
                    <div class="space-y-3 text-xs">
                        <div class="flex items-center justify-between gap-3 rounded-xl border border-slate-800 bg-slate-950/70 px-3 py-2.5">
                            <div>
                                <p class="text-[12px] font-semibold text-slate-100">
                                    18h30 • Linha Norte – IFSP / UNIMÓDULO
                                </p>
                                <p class="mt-0.5 text-[11px] text-slate-400">
                                    Em andamento • 44/48 presentes
                                </p>
                            </div>
                            <span class="inline-flex items-center gap-1 rounded-full bg-emerald-500/10 px-2.5 py-1 text-[10px] font-medium text-emerald-200 border border-emerald-500/40">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                Em andamento
                            </span>
                        </div>
    
                        <div class="flex items-center justify-between gap-3 rounded-xl border border-slate-800 bg-slate-950/70 px-3 py-2.5">
                            <div>
                                <p class="text-[12px] font-semibold text-slate-100">
                                    18h15 • Linha Sul – FATEC / IFSP
                                </p>
                                <p class="mt-0.5 text-[11px] text-slate-400">
                                    Concluída • 31/42 presentes
                                </p>
                            </div>
                            <span class="inline-flex items-center gap-1 rounded-full bg-sky-500/10 px-2.5 py-1 text-[10px] font-medium text-sky-200 border border-sky-500/40">
                                Concluída
                            </span>
                        </div>
    
                        <div class="flex items-center justify-between gap-3 rounded-xl border border-slate-800 bg-slate-950/70 px-3 py-2.5">
                            <div>
                                <p class="text-[12px] font-semibold text-slate-100">
                                    22h45 • Linha Norte – IFSP / UNIMÓDULO (retorno)
                                </p>
                                <p class="mt-0.5 text-[11px] text-slate-400">
                                    Prevista • capacidade 48
                                </p>
                            </div>
                            <span class="inline-flex items-center gap-1 rounded-full bg-amber-500/10 px-2.5 py-1 text-[10px] font-medium text-amber-200 border border-amber-400/40">
                                Prevista
                            </span>
                        </div>
                    </div>
                </div>
            </section>
    
            {{-- Parte de baixo: últimas inscrições + alertas --}}
            <section class="mt-8 grid gap-6 lg:grid-cols-[minmax(0,1.5fr)_minmax(0,1fr)]">
                {{-- Tabela de últimas inscrições --}}
                <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-5 md:p-6 shadow-xl shadow-slate-950/50">
                    <div class="flex items-center justify-between gap-3 mb-4">
                        <div>
                            <h2 class="text-sm font-semibold">
                                Últimas inscrições recebidas
                            </h2>
                            <p class="mt-1 text-xs text-slate-400">
                                Estudantes que se cadastraram recentemente no sistema.
                            </p>
                        </div>
                       
                           class="text-[11px] font-medium text-sky-300 hover:text-sky-200">
                            Ver todos
                      
                    </div>
    
                    <div class="overflow-hidden rounded-xl border border-slate-800 bg-slate-950/60">
                        <table class="min-w-full divide-y divide-slate-800 text-xs">
                            <thead class="bg-slate-950/80 text-[11px] uppercase tracking-[0.12em] text-slate-400">
                                <tr>
                                    <th class="px-3 py-2 text-left">Estudante</th>
                                    <th class="px-3 py-2 text-left">Instituição</th>
                                    <th class="px-3 py-2 text-left">Status</th>
                                    <th class="px-3 py-2 text-left">Data</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800">
                                {{-- Exemplo de linha – depois vira @foreach --}}
                                <tr class="hover:bg-slate-900/80">
                                    <td class="px-3 py-2">
                                        <div class="flex items-center gap-2">
                                            <div class="flex h-7 w-7 items-center justify-center rounded-full bg-slate-800 text-[11px] font-semibold">
                                                HF
                                            </div>
                                            <div class="min-w-0">
                                                <p class="truncate text-[12px] font-medium text-slate-100">
                                                    Hyan Ferreira
                                                </p>
                                                <p class="truncate text-[11px] text-slate-500">
                                                    CPF • 123.456.789-10
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p class="text-[12px] text-slate-100">
                                            IFSP - Caraguatatuba
                                        </p>
                                        <p class="text-[11px] text-slate-500">
                                            ADS • Noturno
                                        </p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <span class="inline-flex items-center gap-1 rounded-full bg-amber-500/10 px-2 py-0.5 text-[10px] font-medium text-amber-200 border border-amber-400/40">
                                            Em análise
                                        </span>
                                    </td>
                                    <td class="px-3 py-2 text-[11px] text-slate-400">
                                        10/03/2025 às 19:25
                                    </td>
                                </tr>
    
                                <tr class="hover:bg-slate-900/80">
                                    <td class="px-3 py-2">
                                        <div class="flex items-center gap-2">
                                            <div class="flex h-7 w-7 items-center justify-center rounded-full bg-slate-800 text-[11px] font-semibold">
                                                ME
                                            </div>
                                            <div class="min-w-0">
                                                <p class="truncate text-[12px] font-medium text-slate-100">
                                                    Maria Eduarda
                                                </p>
                                                <p class="truncate text-[11px] text-slate-500">
                                                    CPF • 987.654.321-00
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p class="text-[12px] text-slate-100">
                                            UNIMÓDULO
                                        </p>
                                        <p class="text-[11px] text-slate-500">
                                            Psicologia • Noturno
                                        </p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <span class="inline-flex items-center gap-1 rounded-full bg-emerald-500/10 px-2 py-0.5 text-[10px] font-medium text-emerald-200 border border-emerald-500/40">
                                            Aprovado
                                        </span>
                                    </td>
                                    <td class="px-3 py-2 text-[11px] text-slate-400">
                                        10/03/2025 às 18:40
                                    </td>
                                </tr>
    
                                <tr class="hover:bg-slate-900/80">
                                    <td class="px-3 py-2">
                                        <div class="flex items-center gap-2">
                                            <div class="flex h-7 w-7 items-center justify-center rounded-full bg-slate-800 text-[11px] font-semibold">
                                                KS
                                            </div>
                                            <div class="min-w-0">
                                                <p class="truncate text-[12px] font-medium text-slate-100">
                                                    Kauan Silva
                                                </p>
                                                <p class="truncate text-[11px] text-slate-500">
                                                    CPF • 111.222.333-44
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2">
                                        <p class="text-[12px] text-slate-100">
                                            FATEC - São Sebastião
                                        </p>
                                        <p class="text-[11px] text-slate-500">
                                            Gestão Portuária • Noturno
                                        </p>
                                    </td>
                                    <td class="px-3 py-2">
                                        <span class="inline-flex items-center gap-1 rounded-full bg-rose-500/10 px-2 py-0.5 text-[10px] font-medium text-rose-200 border border-rose-500/40">
                                            Reprovado
                                        </span>
                                    </td>
                                    <td class="px-3 py-2 text-[11px] text-slate-400">
                                        09/03/2025 às 21:10
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    
                {{-- Alertas / pendências --}}
                <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-5 md:p-6 shadow-xl shadow-slate-950/50">
                    <div class="flex items-center justify-between gap-3 mb-4">
                        <div>
                            <h2 class="text-sm font-semibold">
                                Alertas e pendências
                            </h2>
                            <p class="mt-1 text-xs text-slate-400">
                                Pontos de atenção que exigem análise da equipe.
                            </p>
                        </div>
                    </div>
    
                    <div class="space-y-3 text-xs">
                        <div class="flex items-start gap-3 rounded-xl border border-amber-400/40 bg-amber-400/10 px-3.5 py-3">
                            <div class="mt-0.5">
                                <svg class="h-4 w-4 text-amber-200" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 16h.01" />
                                    <path d="M12 8v4" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-amber-50">
                                    18 estudantes com documentos pendentes de análise
                                </p>
                                <p class="mt-1 text-[11px] text-amber-100/90">
                                    Priorize a validação dos documentos para liberar ou reprovar as vagas
                                    dentro do prazo do edital.
                                </p>
                             
                                <a  class="mt-1 inline-flex items-center gap-1 text-[11px] font-medium text-rose-100 hover:text-rose-50">  Ver lista</a>
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="m13 6 6 6-6 6" />
                                    </svg>
                                
                            </div>
                        </div>
    
                        <div class="flex items-start gap-3 rounded-xl border border-rose-500/40 bg-rose-500/10 px-3.5 py-3">
                            <div class="mt-0.5">
                                <svg class="h-4 w-4 text-rose-200" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 8v4" />
                                    <path d="M12 16h.01" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-rose-50">
                                    7 estudantes próximos ao limite de faltas
                                </p>
                                <p class="mt-1 text-[11px] text-rose-100/90">
                                    Verifique os casos de assiduidade crítica para evitar uso indevido da vaga
                                    e permitir remanejamento, se necessário.
                                </p>
                                    <a  class="mt-1 inline-flex items-center gap-1 text-[11px] font-medium text-rose-100 hover:text-rose-50">  Ver estudantes em risco</a>
                                  
                                  

                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="m13 6 6 6-6 6" />
                                    </svg>
                              
                            </div>
                        </div>
    
                        <div class="flex items-start gap-3 rounded-xl border border-sky-500/40 bg-sky-500/10 px-3.5 py-3">
                            <div class="mt-0.5">
                                <svg class="h-4 w-4 text-sky-200" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path d="M18 16.08A6 6 0 0 0 12 9H3" />
                                    <path d="m7 4-4 5 4 5" />
                                    <path d="M3 3v18h18" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-sky-50">
                                    Oportunidade de otimizar rotas
                                </p>
                                <p class="mt-1 text-[11px] text-sky-100/90">
                                    Há linhas com baixa ocupação em horários específicos. Avalie a possibilidade
                                    de remanejamento ou unificação de rotas.
                                </p>
                             
                                <a  class="mt-1 inline-flex items-center gap-1 text-[11px] font-medium text-rose-100 hover:text-rose-50"> Abrir relatorio de rotas</a>
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="m13 6 6 6-6 6" />
                                    </svg>
                               
                            </div>
                        </div>
    
                        <p class="mt-1 text-[11px] text-slate-500">
                            Estes indicadores são apenas exemplos. Depois você pode conectar com consultas reais de
                            assiduidade, documentos e ocupação.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
