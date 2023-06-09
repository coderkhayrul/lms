<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2 text-left">Phone</th>
            <th class="border px-4 py-2 text-left">Register</th>
            <th class="border px-4 py-2 text-left">Action</th>
        </tr>
        @foreach ($leads as $lead)
        <tr>
            <td class="border px-4 py-2">{{ $lead->name }}</td>
            <td class="border px-4 py-2">{{ $lead->email }}</td>
            <td class="border px-4 py-2">{{ $lead->phone }}</td>
            <td class="border px-4 py-2 text-center">{{ date('F j ,Y', strtotime($lead->created_at)) }}</td>
            <td class="border px-4 py-2 text-center">
                <div class="flex">
                    <a class="me-2" href="{{ route('leads.show',$lead->id) }}">@include('components.icons.show')</a>
                    <a class="me-2" href="{{ route('leads.edit',$lead->id) }}">@include('components.icons.edit')</a>
                    <form onsubmit="return confirm('are you sure?')" wire:submit.prevent="leadDelete({{ $lead->id }})">
                        <button type="submit">@include('components.icons.delete')</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $leads->links() }}
    </div>
</div>
