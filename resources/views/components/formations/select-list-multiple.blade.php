<div wire:ignore class="w-full">
    <select multiple class="form-select select2 w-full" data-minimum-results-for-search="Infinity" data-placeholder="{{__('Sélectionnez une option')}}" {{ $attributes }}>
        <option></option>
        @foreach($list as $key => $item)
            <option
                @if(isset($selected))
                {{ $selected === $item->id ? 'selected' : '' }}
                @endif
                value="{{$item->id}}">{{$item->intituleCommun }}</option>
        @endforeach
    </select>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.selectpicker').select2({
                placeholder: '{{__('Sélectionnez une option')}}',
                allowClear: true
            });
            $('.selectpicker').on('change', function (e) {
                let elementName = $(this).attr('id');
                var data = $(this).select2("val");
            @this.set(elementName, data);
            });
        });
    </script>
@endpush
