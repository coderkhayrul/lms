<div>
    <table class="w-full table-auto">
        <tr>
            <th width="15%" class="border px-4 py-2 text-left">Name</th>
            <th width="70%" class="border px-4 py-2 text-left">Permission</th>
            <th width="15%" class="border px-4 py-2 text-left">Action</th>
        </tr>
        @foreach ($roles as $role)
            <tr>
                <td class="border px-4 py-2">{{ $role->name }}</td>
                <td class="border px-4 py-2 text-center">
                    @forelse($role->getPermissionNames() as $permission)
                        <span class="px-2 py-1 bg-gray-200 rounded-full text-sm">{{ $permission }}</span>
                    @empty
                        <span class="px-2 py-1 bg-red-200 rounded-full text-sm">No Permission</span>
                    @endforelse
                </td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex">
                        <a class="me-2" href="{{ route('roles.edit', $role->id) }}">@include('components.icons.edit')</a>
                        <form onsubmit="return confirm('are you sure?')" wire:submit.prevent="roleDelete({{ $role->id }})">
                            <button type="submit">@include('components.icons.delete')</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $roles->links() }}
    </div>
