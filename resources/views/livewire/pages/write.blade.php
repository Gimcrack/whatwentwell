<div x-data="{
        editingPrompt : false,

        showInvalid : {{ (int) $invalid }},

        showReset : {{ (int) strlen($entry) }},

        showSubmit : {{ (int) strlen($entry) }},

        currentDate : moment.utc('{{ $this->currentDate }}').local().format('MMM D'),

        currentTime : moment.utc('{{ $this->currentDate }}').local().format('h:mm A'),

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

     class="flex flex-col w-full justify-center items-center text-2xl sm:text-4xl md:text-5xl lg:text-6xl space-y-16">

    <div wire:poll.60s class="text-4xl md:text-6xl lg:text-8xl font-heading relative">
        <span>
            <i class="fad fa-calendar-star"></i> <span x-text="currentDate"></span>
        </span>
        <span class="hidden md:inline">
            <i class="fad fa-clock"></i> <span x-text="currentTime"></span>
        </span>
    </div>
    <div class="font-heading tracking-wider justify-center flex space-x-20 text-center w-full">
        <p x-show="! editingPrompt">
            <label @click="toggleEditPrompt" for="entry" class="hover:underline hover:text-green-500 dark-hover:text-green-100 cursor-pointer">
                {{$prompt}}
            </label>
        </p>
        <p x-cloak x-show="editingPrompt" class="flex w-full">
            <input @blur="toggleEditPrompt" x-ref="prompt" type="text" wire:model="prompt" class="bg-transparent rounded
             border-b p-6 w-full border-gray-800 outline-none
             dark:border-green-400 dark-focus:bg-black dark-focus:border-green-200
             focus:bg-white
             transition-all duration-150"
            >
        </p>

        <button wire:click="newPrompt"
            class="transition-all duration-150 hover:text-green-500 dark-hover:text-green-100"
        >
            <i class="fal fa-fw fa-sync"></i>
        </button>
    </div>

    <div class="w-full">
        <textarea @keyup.enter="detectShiftAndSubmit" wire:model="entry" id="entry" autofocus rows="4" x-ref="entry"
                 class="bg-transparent rounded font-heading
             border-b p-6 text-lg lg:text-2xl w-full border-gray-800 outline-none
             dark:border-green-400 dark-focus:bg-black dark-focus:border-green-200
             focus:bg-white
             transition-all duration-150
    "></textarea>
        <div class="text-right font-heading text-lg w-full mt-4 text-gray-600">
            hint: ctrl + enter to continue
        </div>
    </div>


    <p
        x-cloak
        x-show.transition="showInvalid"
        class="text-xl text-red-700 dark:text-red-500 tracking-normal font-heading"
    >
        Please enter a response before continuing.
    </p>



    <div class="flex space-x-20 text-2xl sm:text-4xl md:text-5xl lg:text-6xl mb-10">
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

    <div class="mt-10">
        &nbsp;
    </div>
</div>
