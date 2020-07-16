@error($attributes->get('field'))
<p
    {{ $attributes->except('field') }}
    class="text-xl text-red-700 dark:text-red-500 tracking-normal font-heading"
>
    {{ $message }}
</p>
@enderror
