<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2 text-left">Role</th>
            <th class="border px-4 py-2 text-left">Register</th>
            <th class="border px-4 py-2 text-left">Action</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">Role Name</td>
                <td class="border px-4 py-2 text-center">{{ date('F j ,Y', strtotime($user->created_at)) }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex">
                        <a class="me-2" href="">@include('components.icons.show')</a>
                        <a class="me-2" href="">@include('components.icons.edit')</a>
                        <form onsubmit="return confirm('are you sure?')" wire:submit.prevent="userDelete({{ $user->id }})">
                            <button type="submit">@include('components.icons.delete')</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $users->links() }}
    </div>
