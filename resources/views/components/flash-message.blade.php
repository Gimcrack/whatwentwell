@php
    $classes = [
        'success' => 'bg-green-500 border-green-900 text-green-900',
        'warning' => 'bg-yellow-500 border-yellow-900 text-yellow-900',
        'danger' => 'bg-red-500 border-red-900 text-red-900',
    ];
    $icons = [
        'success' => 'fa-check-circle',
        'warning' => 'fa-exclamation-triangle',
        'danger' => 'fa-exclamation-circle'
    ]
@endphp

<div class="fixed bottom-0 right-0">
    <div {{ $attributes->except('type') }}
         class="flex items-center justify-center
         text-lg sm:text-2xl md:text-4xl
         p-2 px-3 sm:p-4 sm:px-6
         m-2 sm:m-4 md:m-8
         rounded-lg shadow-2xl
        {{ $classes[$attributes->get('type')] }}"
    >
        <i class="fa fa-fw {{ $icons[$attributes->get('type')] }}"></i>
        <span class="ml-4">{{ $slot }}</span>
    </div>
</div>
