<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between m-0 items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Course Show') }}
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
                    <div class="flex flex-full">
                        <div class="pt-10">
                            <h2 class="font-bold mb-2 underline">{{ $course->name }}</h2>
                            <p class="mb-4 italic"> Price: ${{ $course->price }}</p>
                            <p class="mb-4">{{ $course->description }}</p>
                        </div>
                    </div>
                    <h2 class="font-bold">Classes</h2>
                    <table class="w-full table-auto ">
                        <tr>
                            <th width="70%" class="border px-4 py-2 text-left">Name</th>
                            <th class="border px-4 py-2 text-left">Action</th>
                        </tr>
                        @foreach($course->curriculums as $curriculum)
                            <tr>
                                <td class="border px-4 py-2 text-left">{{ $curriculum->name }}</td>
                                <td class="border px-4 py-2 text-left">
                                    <div class="flex">
                                        <a class="me-2" href="{{ route('curriculum.show', $curriculum->id) }}">@include('components.icons.show')</a>
                                        <form onsubmit="return confirm('are you sure?')" wire:submit.prevent="classDelete({{ $curriculum->id }})">
                                            <button type="submit">@include('components.icons.delete')</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
