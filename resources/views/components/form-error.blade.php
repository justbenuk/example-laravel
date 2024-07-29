@props(['name'])

@error($name)
<p class=" text-red-500 font-bold mt-4">{{$message}}</p>
@enderror
