<label for="{{ $name }}">{{ $label }}</label>
@if($type == 'textarea')
    <textarea id="{{ $name }}" wire:model.lazy="{{ $name }}"
        class="{{ $class }}" placeholder="{{ $placeholder }}" {{ $required }}></textarea>
@else
    <input id="{{ $name }}" type="{{ $type }}" wire:model.lazy="{{ $name }}"
        class="{{ $class }}" placeholder="{{ $placeholder }}" {{ $required }}>
@endif
@error($name) <span class="error">{{ $message }}</span> @enderror
