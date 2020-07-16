<div x-init="listen" x-data="{
        editingPrompt : false,

        showInvalid : {{ (int) $invalid }},

        showReset : {{ (int) strlen($entry) }},

        showSubmit : {{ (int) strlen($entry) }},

        currentDate : moment.utc('{{ $this->currentDate }}').local().format('MMM D'),

        currentTime : moment.utc('{{ $this->currentDate }}').local().format('h:mm A'),

        listen() {
            window.livewire.on('Continue', () => {
                setTimeout( () => {
                    this.$refs.entry.focus();
                }, 500 );
            });

            window.livewire.on('Focus', () => {
                setTimeout( () => {
                    this.$refs.entry.focus();
                }, 500 );
            });

            this.focus();
        },

        clear() {
            @this.call('clearEntry');
            this.focus();
        },

        focus() {
            this.$refs.entry.focus();
        },

        toggleEditPrompt() {
            if ( ! this.editingPrompt ) {
                this.editingPrompt = true;
                setTimeout(() =>  {
                    this.$refs.prompt.focus();
                    this.$refs.prompt.setSelectionRange(0,9999);
                }, 300);
            }
            else {
                this.editingPrompt = false;
            }
        },

        detectShiftAndSubmit(e) {
           if ( e.ctrlKey ) {
              @this.call('continue')
           }
        }
    }"

     class="flex flex-col w-full justify-center items-center text-2xl sm:text-4xl md:text-5xl lg:text-6xl space-y-16 flex-1 h-full">

    <div class="mx-auto flex space-x-10 items-center">
{{--        <i class="fa fa-fw fa-caret-left"></i>--}}
        <div wire:poll.30s class="text-4xl md:text-5xl lg:text-6xl font-heading relative rounded-b-lg bg-gray-800 dark:bg-green-500 text-gray-100 dark:text-gray-800 p-6">
            <span>
                <i class="fad fa-calendar-star"></i> <span x-text="currentDate"></span>
            </span>
            {{--        <span class="hidden md:inline">--}}
            {{--            <i class="fad fa-clock"></i> <span x-text="currentTime"></span>--}}
            {{--        </span>--}}
        </div>
{{--        <i class="fa fa-fw fa-caret-right"></i>--}}
    </div>

    <div class="flex flex-col space-y-16 flex-1 justify-center">
        <div class="font-heading tracking-wider justify-center flex space-x-20 text-center w-full">
            <label for="entry">
                {{$this->prompt['question']}}
            </label>
        </div>

        <div class="w-full">
            <x-textarea @keyup.enter="detectShiftAndSubmit" wire:model="entry" id="entry" rows="4" autofocus
                        x-ref="entry"></x-textarea>
            <div class="flex font-heading text-lg text-gray-600 mt-4" style="min-height:4rem;">
                <div wire:loading class="flex-1">
                    <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                </div>
                <div>&nbsp;</div>
                <div x-cloak x-show.transition="showSubmit" class="text-right w-full">
                    hint: ctrl + enter to continue
                </div>
            </div>
        </div>

        <x-invalid-helptext x-cloak
                            x-show.transition="showInvalid">
            Please enter a response before continuing.
        </x-invalid-helptext>

        <div class="flex justify-center space-x-20 text-2xl sm:text-4xl md:text-5xl lg:text-6xl">
            <span x-cloak x-show.transition="showReset">
                <button x-on:click="clear"
                        class="transition-all duration-150 hover:text-green-500 dark-hover:text-green-100"
                >
                    <i class="fal fa-fw fa-undo"></i>
                </button>
            </span>

            <span class="delay-100" x-cloak x-show.transition="showSubmit">
                <button wire:click="continue"
                        class="transition-all duration-150 hover:text-green-500 dark-hover:text-green-100"
                >
                    <i class="fal fa-fw fa-play"></i>
                </button>
            </span>
        </div>


{{--            <button @click="$dispatch('decr')" class="btn btn-green btn-outline fixed" style="top:45%; left: 4rem">--}}
{{--                <i class="fa fa-fw fa-chevron-left cursor-pointer"></i>--}}
{{--            </button>--}}

{{--            <button @click="$dispatch('incr')" class="btn btn-green btn-outline fixed" style="top:45%; right: 4rem;">--}}
{{--                <i class="fa fa-fw fa-chevron-right cursor-pointer"></i>--}}
{{--            </button>--}}

    </div>
</div>
