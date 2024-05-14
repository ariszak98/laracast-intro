@props(['name'])
@error($name)
    <div class="mt-2"><ul><li class="text-red-500 text-xs font-semibold">{{ $message }}</li></ul></div>
@enderror