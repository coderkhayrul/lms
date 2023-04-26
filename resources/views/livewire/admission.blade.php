<div>
    <form wire:submit.prevent="search" class="flex items-center">
        <input class="lms-input w-full" type="text" wire:model.lazy="search" placeholder="Search" required>
        <div class="ml-2">
            <button type="submit" class="py-2 px-3 text-white bg-blue-700 hover:bg-blue-800">Search</button>
        </div>
    </form>

    <div class="mt-4">
        @if(count($leads) > 0)
            <form wire:submit.prevent="admit">
                <select wire:model.lazy="lead_id" class="lms-input w-full">
                    <option selected>Select Lead</option>
                    @foreach($leads as $lead)
                        <option value="{{$lead->id}}">{{$lead->name . '-' . $lead->email}}</option>
                    @endforeach
                </select>
                @if(!empty($lead_id))
                    <select wire:change="courseSelected" wire:model.lazy="course_id" class="lms-input w-full my-3">
                        <option selected>Select Course</option>
                        @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                @endif
                @if(!empty($selectedCourse))
                    <h3 class="mb-2">Price: ${{ number_format($selectedCourse->price) }}</h3>
{{--                    <div class="mb-4">--}}
{{--                        <input type="number" step=".01" class="lms-input w-full" placeholder="Payment Now">--}}
{{--                    </div>--}}
                    <!-- Loading State -->
                    @include('components.icons.loading')
                    <button wire:loading.remove type="submit" class="lms-button">
                        Pay
                    </button>
                @endif
            </form>
        @endif
</div>
