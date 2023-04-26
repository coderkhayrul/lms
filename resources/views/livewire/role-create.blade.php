<div>
    <form wire:submit.prevent="submitForm" class="mb-4">
        <div mb-4>
            <lable for="name" class="lms-lable">Name</lable>
            <input id="name" wire:model.lazy="name" class="lms-input w-full mb-2" type="text" name="name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <h3 class="font-semibold mb-3">Permission</h3>
        <div class="flex flex-wrap mb-5">
            @foreach ($permissions as $permission)
                <div class="w-1/3">
                    <label class="inline-flex items-center">
                        <input type="checkbox" wire:model.lazy="selectPermission" value="{{ $permission->name }}" class="form-checkbox">
                        <span class="ml-2">{{ $permission->name }}</span>
                    </label>
                </div>
            @endforeach
                @error('selectPermission') <span class="error">{{ $message }}</span> @enderror
        </div>


        <!-- Loading State -->
        @include('components.icons.loading')
        <button wire:loading.remove type="submit" class="lms-button">
            Save
        </button>
    </form>
</div>
