@props(['name'])
@error($name)
<p class="text-danger text-center">{{$message}}</p>
@enderror