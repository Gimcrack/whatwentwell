<div class="container mx-auto flex-1 flex flex-col h-full items-center justify-center text-lg md:text-2xl lg:text-4xl">
    <div
        class="text-xl md:text-4xl lg:text-6xl font-heading relative rounded-b-lg bg-gray-800 dark:bg-green-500 text-gray-100 dark:text-gray-800 p-2 md:p-4 lg:p-6">
            <span>
                {{ $attributes['title'] }}
            </span>
    </div>


    <div class="flex flex-1 flex-col justify-center h-full">
        <div class="flex flex-1 flex-col justify-center w-full max-w-xl h-full">
            {{ $slot }}
        </div>
    </div>
</div>
