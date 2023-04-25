<div>
    <form wire:submit.prevent="submitForm" class="mb-4">
        <div class="flex -mx-4 mb-4">
            <div class="flex-1 mb-4">
                <lable class="lms-lable">Name</lable>
                <input wire:model.lazy="name" class="lms-input w-full pr-2" type="text" name="name">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 mb-4">
                <lable class="lms-lable">Phone</lable>
                <input wire:model.lazy="phone" class="lms-input w-full" type="text" name="phone">
                @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 mb-4">
                <lable class="lms-lable">Email</lable>
                <input wire:model.lazy="email" class="lms-input w-full" type="email" name="email">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <!-- Loading State -->
        @include('components.icons.loading')
        <button wire:loading.remove type="submit" class="lms-button">
            Update
        </button>
    </form>
    <h3 class="font-bold text-lg">Notes</h3>
    @forelse($notes as $note)
        <p class="p-2 border border-gray-200 mb-2 bg-gray-100">{{$note->description}}</p>
    @empty
        <h2>Note Not Found !</h2>
    @endforelse
    <button class="mb-4">Add New Note</button>
    <form wire:submit.prevent="addNote">
        <div class="mb-4">
            <textarea wire:model.lazy="note" name="description" class="lms-input w-full"></textarea>
        </div>
    <button type="submit" class="lms-button">Add New</button>
    </form>
</div>
