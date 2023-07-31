@php
  $class ??= null;
  $name ??= '';
  $value ??= '';  
  $label ??= Str::ucfirst($name);
@endphp

<div @class(['form-check form-switch', $class])>
  <input type="hidden" name="{{ $name }}" value="0">
  <input type="checkbox" class="form-check-input @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" role="switch" value="1" @checked(old($name, $value ?? false))>
  <label for="{{ $name }}" class="form-check-label">{{ $label }}</label>
  @error($name)
  <div class="invalid-feedback">
    {{ $message }} 
  </div>
  @enderror
</div>