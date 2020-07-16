<div style="max-width:1280px" class="flex flex-col space-y-20 h-screen antialiased leading-none items-center justify-center w-full mx-auto px-4 md:px-20">

    @if($page === 'write')
        <div x-init="listen" @incr="incr" @decr="decr" class="flex-1 flex flex-col" x-data="{ selected : 0, count : {{ count($prompts) }},

            incr() {
                this.selected++;
                if ( this.selected >= this.count )
                    this.selected = 0;
            },

            decr() {
                this.selected--;
                if ( this.selected < 0 )
                    this.selected = this.count-1;
            },

            listen() {
                window.livewire.on('Continue', () => {
                    this.incr();
                });
                console.log('Continuing');
            },

            select(key) {
                this.selected = key;
                window.livewire.emit('Focus');
            }
        }">
            <div class="fixed top-0 left-0 right-0 z-50">
                <div class="flex w-full justify-center space-x-8 z-50" style="margin-top:20vh">
                    @foreach($prompts as $key => $prompt)
                        <i @click="select({{$key}})" :class="{
                            'fa' : ({{$key}} == selected),
                            'fal' : ({{$key}} != selected)
                        }" class="fa-fw fa-circle text-gray-500 dark:text-gray-700 cursor-pointer"></i>
                    @endforeach
                </div>
            </div>

            @foreach($prompts as $key => $prompt)
                <div x-cloak class="fixed inset-0 transition-all transform duration-300" x-show="selected == {{$key}}"
                    x-transition:enter-start="translate-x-1/2 opacity-0"
                    x-transition:leave-end="-translate-x-1/2 opacity-0"
                >

                    <livewire:pages.write :key="$key" :prompt="$prompt->toArray()"/>
                </div>
            @endforeach

        </div>
    @elseif($page === 'about')

    @elseif($page === 'settings')

    @elseif($page === 'history')

    @endif

    <div class="w-screen">
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

