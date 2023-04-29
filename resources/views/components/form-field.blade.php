<label for="{{ $name }}">{{ $label }}</label>
@if($type == 'textarea')
    <textarea id="{{ $name }}" wire:model.lazy="{{ $name }}"
        class="{{ $class }}" placeholder="{{ $placeholder }}" {{ $required }}></textarea>
{{--@elseif($type == 'select')--}}
{{--    <input id="{{ $name }}" type="{{ $type }}" wire:model.lazy="{{ $name }}"--}}
{{--           class="{{ $class }}" placeholder="{{ $placeholder }}" {{ $required }}>--}}
@else
    <input id="{{ $name }}" type="{{ $type }}" wire:model.lazy="{{ $name }}"
        class="{{ $class }}" placeholder="{{ $placeholder }}" {{ $required }}>
@endif
@error($name) <span class="error">{{ $message }}</span> @enderror
