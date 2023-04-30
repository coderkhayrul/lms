<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Description</th>
            <th class="border px-4 py-2 text-left">Price</th>
            <th class="border px-4 py-2 text-left">Created at</th>
            <th class="border px-4 py-2 text-left">Action</th>
        </tr>
        @foreach ($courses as $course)
            <tr>
                <td class="border px-4 py-2">{{ $course->name }}</td>
                <td class="border px-4 py-2">{{ $course->description }}</td>
                <td class="border px-4 py-2">{{ $course->price }}</td>
                <td class="border px-4 py-2 text-center">{{ date('F j ,Y', strtotime($course->created_at)) }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex">
                        <a class="me-2" href="{{ route('leads.show',$course->id) }}">@include('components.icons.show')</a>
                        <a class="me-2" href="{{ route('leads.edit',$course->id) }}">@include('components.icons.edit')</a>
                        <form onsubmit="return confirm('are you sure?')" wire:submit.prevent="courseDelete({{ $course->id }})">
                            <button type="submit">@include('components.icons.delete')</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $courses->links() }}
    </div>
</div>
