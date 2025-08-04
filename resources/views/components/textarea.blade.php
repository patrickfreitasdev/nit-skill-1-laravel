@props(
[
    'name',
    'label' => '',
    'type' => 'text',
    'value' => '',
    'required' => false,
    'placeholder' => '',
])

<label for="{{ $name }}" class="form-label" {{ $attributes }}>
    {{ $label }}
    @if($required)
        <span class="text-danger">*</span>
    @endif
</label>
<textarea
    type="{{$type}}"
    class="form-control"
    id="{{ $name }}"
    name="{{ $name }}"
    @if($required)
    required
    @endif
    placeholder="{{ $placeholder  }}">{{ $value }}
</textarea>
@error($name)
    <span class="text-danger login-error d-block mt-1 mb-1">{{ $message }}</span>
@enderror
