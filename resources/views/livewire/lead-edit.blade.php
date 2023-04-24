<div>
    <form wire:submit.prevent="submitForm">
        <div class="mb-4">
            <lable class="lms-lable">Name</lable>
            <input wire:model="name" class="lms-input" type="text" name="name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <lable class="lms-lable">Phone</lable>
            <input wire:model="phone" class="lms-input" type="text" name="phone">
            @error('phone') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <lable class="lms-lable">Email</lable>
            <input wire:model="email" class="lms-input" type="email" name="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div wire:loading class="flex align-middle">
            @include('components.icons.loading')
            Loading...
        </div>
        <button wire:loading.remove type="submit" class="p-3 border bg-green-500 text-white rounded">
            Update
        </button>
    </form>
</div>
