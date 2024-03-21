@php
$required = (Str::contains($field['rules'], 'required')) ? "required" : "";
$required_mark = ($required != "") ? '<span class="text-danger"> <strong>*</strong> </span>' : '';
@endphp

<div class="form-group mb-3 {{ $errors->has($field['name']) ? ' has-error' : '' }}">
    <label class="form-label" for="{{ $field['name'] }}">
        <strong>{{ __($field['label']) }}</strong> ({{ $field['name'] }})</label> {!! $required_mark !!}
    </label>
    <div class="form-input">
        @foreach(Arr::get($field, 'options', []) as $val => $label)
            <input type="checkbox" @if( old($field['name'], setting($field['name'])) == $val ) checked @endif name="{{ $field['name'] }}" value="{{ $val }}"> {{ $label }}
        @endforeach

        @if ($errors->has($field['name'])) <small class="help-block">{{ $errors->first($field['name']) }}</small> @endif
    </div>
</div>