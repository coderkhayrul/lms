<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between m-0 items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create a Course') }}
            </h2>
            <div class="flex items-center">
                <a href="{{ route('course.index') }}" class="lms-button">Back</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:course-create>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
