<div>
    <form wire:submit.prevent="submitForm">
        <div class="flex">
            <div class="w-1/2 mr-2">
                <label for="name">Name</label>
                <input id="name" type="text" wire:model.lazy="name" class="w-full rounded-lg">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="w-1/2 ml-2">
                <label for="email">Email</label>
                <input id="email" type="email" wire:model.lazy="email" class="w-full rounded-lg">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex mb-5">
            <div class="w-1/2 mr-2">
                <label for="password">Password</label>
                <input id="password" type="password" wire:model.lazy="password" class="w-full rounded-lg">
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="w-1/2 mr-2">
                <label for="role">Role</label>
                <select id="role" wire:model.lazy="role" class="w-full rounded-lg">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <!-- Loading State -->
        @include('components.icons.loading')
        <button wire:loading.remove type="submit" class="lms-button">
            Save
        </button>
    </form>
</div>
