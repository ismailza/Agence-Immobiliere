@php
  $type ??= 'text';
  $class ??= null;
  $name ??= '';
  $value ??= '';  
  $label ??= Str::ucfirst($name);
  $placeholder ??= $label;
  $multiple ??= false;
@endphp

<div @class(['form-group', $class])>
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
  @if ($type === 'textarea')
  <textarea class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
  @else
  <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}@if (!$multiple)" @else[]" multiple @endif value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}">
  @endif
  @error($name)
  <div class="invalid-feedback">
    {{ $message }} 
  </div>
  @enderror
</div>