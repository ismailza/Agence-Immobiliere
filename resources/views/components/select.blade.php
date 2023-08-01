@php
  $class ??= null;
  $name ??= '';
  $value ??= '';
  $label ??= Str::ucfirst($name);
  $options ??= [];
  $multiple ??= false;
  $placeholder ??= $label;
@endphp

<div @class(['form-group', $class])>
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
  <select class="form-select" id="{{ $name }}" name="{{ $name }}@if (!$multiple)" @else[]" multiple @endif data-placeholder="{{$placeholder}}">
    @foreach ($options as $v => $option)
      <option @selected($value->contains($v)) value="{{ $v }}">{{ $option }}</option>
    @endforeach
  </select>
  @error($name)
  <div class="invalid-feedback">
    {{ $message }} 
  </div>
  @enderror
</div>
