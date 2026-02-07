@props([
  'name' => 'required'
])

@error($name)
  <p>{{ $message }}</p>
@enderror