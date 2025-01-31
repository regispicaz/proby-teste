<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Projeto') }}
        </h2>
        <a href="{{ route('projects.index') }}">
            <x-secondary-button>Voltar</x-secondary-button>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Editar Projeto - {{ $project->name }}
                </div>

                {{-- Formulário de criação do projeto --}}
                <div class="form px-6">
                    <form action="{{ route('projects.update', $project->id) }}" method="post">
                        @csrf
                        @method('put')

                        {{-- Nome do Projeto --}}
                        <div class="grid">
                            <x-input-label for="name">Nome:</x-input-label>
                            <x-text-input name="name" id="name" placeholder="Digite o nome projeto..."
                                value="{{ $project->name }}" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        {{-- Descrição do projeto --}}
                        <div class="grid mt-2">
                            <x-input-label for="description">Descrição:</x-input-label>
                            <x-text-area name="description" id="description"
                                placeholder="Descreva aqui o seu projeto..." value="{{ $project->description }}" />
                        </div>

                        {{-- observações do andamento do projeto --}}
                        <div class="grid mt-2">
                            <x-input-label for="observation">Observações:</x-input-label>
                            <x-text-area name="observation" id="observation"
                                placeholder="Deixe aqui alguma observação referente ao andamento do projeto..."
                                value="{{ $project->observation }}" />
                        </div>

                        <div class=" grid md:flex w-full md:gap-2">

                            {{-- Data inicial e status do projeto --}}
                            <div class="grid mt-2 w-full">
                                <x-input-label for="starter_date">Início:</x-input-label>
                                <x-date-input name="start_date" id="starter_date" value="{{ $project->start_date }}" />
                                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                            </div>

                            {{-- Status do projeto --}}
                            <div class="grid mt-2 w-full">
                                <x-input-label for="status">Status:</x-input-label>
                                <x-select-input name="status" id="status" :enum="$status"
                                    :value="$project->status ?? null" />
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>
                        </div>

                        <x-primary-button class="mt-2 mb-6">Salvar</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>