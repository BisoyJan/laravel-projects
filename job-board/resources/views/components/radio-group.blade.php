<div>
    @if ($allOption)
        <label for="{{ $name }}-all" class="mb-1 flex items-center">
            <input type="radio" name="{{ $name }}" value="" @checked(!request($name)) id="{{$name}}-all" />
            <span class="ml-2">All</span>
        </label>
    @endif

    @foreach ($options as $option)
        <label for="{{ $name }}-{{ $option }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $name }}" value="{{ $option }}" @checked($option === ($value ?? request($name)))
                id="{{ $name }}-{{$option}}" />
            <span class="ml-2">{{Str::ucfirst($option)}}</span>
        </label>
    @endforeach
</div>
