<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projetos') }}
        </h2>
        <a href="{{ route('projects.create') }}">
            <x-primary-button>novo</x-primary-button>
        </a>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto grid sm:flex gap-4 sm:px-6 lg:px-8 pb-4">
            <x-card-all-proj route="{{ route('projects.index') }}" status="Todos" />
            <x-card-status-pending route="{{ route('projects.pending') }}" status="Pendente" />
            <x-card-status-in-progress route="{{ route('projects.in_progress') }}" status="Em Andamento" />
            <x-card-status-completed route="{{ route('projects.completed') }}" status="Concluído" />
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2 class="mb-4">Todos Projetos</h2>
                    <table class="table w-full">
                        <thead class="bg-zinc-200">
                            <tr>
                                <th class=" text-start">Nome</th>
                                <th class="text-start" width="180">Data de Início</th>
                                <th width="180">Status</th>
                                <th width="180">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr class="border-b gap-4">
                                <td><a href="{{ route('projects.show', $project->id) }}"
                                        class="underline text-blue-500">{{
                                        $project->name }}</a></td>
                                <td>{{ $project->start_date }}</td>
                                <td class="text-center">{{ $project->status }}</td>
                                <td class="text-center">
                                    <a href="{{ route('projects.edit', $project->id) }}">
                                        <x-secondary-button>Editar</x-secondary-button>
                                    </a>
                                    <form action="{{ route('projects.destroy', $project) }}" method="post"
                                        style="display:inline;">
                                        @csrf
                                        @method('delete')
                                        <x-danger-button
                                            onclick="return confirm('Tem certeza que deseja excluir este projeto?')">
                                            Excluir</x-danger-button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Paginanão dos porjetos --}}
                    <div class="pt-4">
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>