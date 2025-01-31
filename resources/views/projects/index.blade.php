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
                    <div class="overflow-x-auto">  <table class="min-w-full divide-y divide-gray-200 table-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nome
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Data de Início
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($projects as $project)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <a href="{{ route('projects.show', $project->id) }}" class="text-blue-600 hover:text-blue-900 underline">
                                        {{ $project->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $project->start_date }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $project->status === 'Concluído' ? 'bg-green-100 text-green-800' : ($project->status === 'Em Andamento' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                        {{ $project->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-center gap-2">
                                    <a href="{{ route('projects.edit', $project->id) }}">
                                        <x-secondary-button class="text-xs">Editar</x-secondary-button>
                                    </a>
                                    <form action="{{ route('projects.destroy', $project) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('delete')
                                        <x-danger-button onclick="return confirm('Tem certeza que deseja excluir este projeto?')" class="text-xs">
                                            Excluir
                                        </x-danger-button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

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
