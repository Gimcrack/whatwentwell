@section('theme'){{ $theme === 'Dark' ? 'mode-dark' : 'mode-light' }}@endsection


<div id="app" class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-green-400 text-4xl">
    <livewire:nav/>

    <div class="flex flex-col space-y-16 h-screen antialiased leading-none items-center justify-center w-1/2 mx-auto">
        <div class="flex">
            What went well today?
        </div>
        <input autofocus type="text" class="bg-transparent
            border-b p-6 text-2xl w-full border-gray-800 outline-none
            dark:border-green-400 dark-focus:bg-black
            focus:border-opacity-50 focus:bg-opacity-50 focus:bg-white
            "
        >

        <div class="flex space-x-4">
            <button class="btn btn-3d btn-gray">Cancel</button>
            <button class="btn btn-3d btn-green">Go</button>
        </div>
    </div>

</div>

