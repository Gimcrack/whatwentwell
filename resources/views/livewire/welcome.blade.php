@section('theme'){{ $theme === 'Dark' ? 'mode-dark' : 'mode-light' }}@endsection


<div id="app" class="bg-gray-300 dark:bg-gray-900 text-gray-900 dark:text-green-400">
    <livewire:nav/>

    <div style="max-width:960px" class="flex flex-col space-y-20 h-screen antialiased leading-none items-center justify-center w-11/12 xl:w-2/3 mx-auto">

        @if($page === 'write')
            <livewire:pages.write/>
        @elseif($page === 'about')

        @elseif($page === 'settings')

        @elseif($page === 'history')

        @endif

        <livewire:menu/>
    </div>

</div>

@push('scripts')
<script>
    window.livewire.on('Navigate', function(page) {
        window.history.pushState({page},page.toUpperCase(),'/' + page);
        console.log({page});
    });

    window.onpopstate = function(event) {
        console.log(event);
    }
</script>
@endpush

