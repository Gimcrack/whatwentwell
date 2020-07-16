<textarea {{ $attributes }}
     class="bg-transparent rounded font-normal
     border-b p-6 text-lg lg:text-4xl w-full border-gray-800 outline-none leading-loose
     dark:border-green-400 dark-focus:bg-black dark-focus:border-green-200
     focus:bg-gray-100
     transition-all duration-150
">
    {{ $slot }}
</textarea>
