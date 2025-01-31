<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Projeto') }}
        </h2>
        <a href="{{ route('projects.index') }}">
            <x-secondary-button>Voltar</x-secondary-button>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="mb-4">{{ $project->name }}</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p><strong>Descrição:</strong> {{ $project->description }}</p>
                            <p><strong>Observações:</strong> {{ $project->observation }}</p>
                        </div>
                        <div>
                            <p><strong>Data de Início:</strong> {{ $project->start_date }}</p>
                            <p><strong>Status:</strong> {{ $project->status }}</p>
                        </div>
                    </div>

                    <div class="mt-4 flex gap-4">

                        <a href="{{ route('projects.edit', $project->id) }}">
                            <x-primary-button>Editar</x-primary-button>
                        </a>

                        <form action="{{ route('projects.destroy', $project) }}" method="post" style="display:inline;">
                            @csrf
                            @method('delete')
                            <x-danger-button onclick="return confirm('Tem certeza que deseja excluir este projeto?')">
                                Excluir</x-danger-button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>