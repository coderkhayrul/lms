<div>
    <form action="">
        <div class="flex">
            <div class="w-1/2 mr-2">
                <label for="name">Name</label>
                <input type="text" wire:model="name" class="w-full rounded-lg">
            </div>
            <div class="w-1/2 ml-2">
                <label for="email">Email</label>
                <input type="email" wire:model="email" class="w-full rounded-lg">
            </div>
        </div>
        <div class="flex">
            <div class="w-1/2 mr-2">
                <label for="password">Password</label>
                <input type="password" wire:model="password" class="w-full rounded-lg">
            </div>
            <div class="w-1/2 ml-2">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" wire:model="password_confirmation" class="w-full rounded-lg">
            </div>
        </div>
        <div class="flex mb-4">
            <div class="w-1/2 mr-2">
                <label for="role">Role</label>
                <select wire:model="role" class="w-full rounded-lg">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-1/2 ml-2">
                <label for="status">Status</label>
                <select wire:model="status" class="w-full rounded-lg">
                    <option value="">Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>
        <!-- Loading State -->
        @include('components.icons.loading')
        <button wire:loading.remove type="submit" class="lms-button">
            Save
        </button>
    </form>
</div>
