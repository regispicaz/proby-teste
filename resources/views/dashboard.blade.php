<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto grid sm:flex gap-4 sm:px-6 lg:px-8">
            <x-card-status-pending route="{{ route('projects.pending') }}" status="Pendente" />
            <x-card-status-in-progress route="{{ route('projects.in_progress') }}" status="Em Andamento" />
            <x-card-status-completed route="{{ route('projects.completed') }}" status="Concluído" />
        </div>
    </div>
</x-app-layout>