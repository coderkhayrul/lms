{{--{{ var_dump($end_date) }}--}}
<div>
    <form wire:submit.prevent="formSubmit">
    <div class="mb-5">
        @include('components.form-field', [
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
            'placeholder' => 'Enter title',
            'class' => 'w-full rounded-lg',
            'required' => 'required'
        ])
    </div>
    <div class="mb-5">
        @include('components.form-field', [
            'label' => 'Description',
            'name' => 'description',
            'type' => 'textarea',
            'placeholder' => 'Enter Description',
            'class' => 'w-full rounded-lg',
            'required' => 'required'
        ])
    </div>
    <div class="mb-5">
        @include('components.form-field', [
            'label' => 'Price',
            'name' => 'price',
            'type' => 'number',
            'placeholder' => 'Enter Price',
            'class' => 'w-full rounded-lg',
            'required' => 'required'
        ])
    </div>
        <div class="flex justify-between">
            <div class="mb-5">
                <lable for="days">Days</lable>
                <div class="flex flex-wrap -mx-4">
                    @foreach($days as $day)
                        <div class="min-w-max flex items-center px-2">
                            <label for="{{ $day }}">
                                <input wire:model.lazy="selectedDays" id="{{ $day }}" type="checkbox" value="{{ $day }}">
                                {{ucfirst($day) }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-5">
                @include('components.form-field', [
                    'label' => 'Time',
                    'name' => 'time',
                    'type' => 'time',
                    'placeholder' => 'Enter Time',
                    'class' => 'w-full rounded-lg',
                    'required' => 'required'
                ])
            </div>
            <div class="mb-5">
                @include('components.form-field', [
                    'label' => 'End Date',
                    'name' => 'end_date',
                    'type' => 'date',
                    'placeholder' => 'Enter End Date',
                    'class' => 'w-full rounded-lg',
                    'required' => 'required'
                ])
            </div>
        </div>

    <!-- Loading State -->
    @include('components.icons.loading')
    <button wire:loading.remove type="submit" class="lms-button">
        Submit
    </button>
    </form>
</div>
