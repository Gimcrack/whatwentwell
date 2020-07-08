<div x-data="{
        showInvalid : {{ (int) $invalid }},

        clear() {
            @this.call('clearEntry');
            this.focus();
        },

        focus() {
            this.$refs.entry.focus();
        },
     }"

     class="flex flex-col justify-center items-center text-2xl sm:text-4xl md:text-5xl lg:text-6xl space-y-16">

    <p class="text-4xl sm:text-8xl font-heading">
        <i class="fad fa-calendar-star"></i> {{ date('M j') }}
    </p>
    <div class="font-heading tracking-wider flex space-x-4 text-center">
        <p>
            <label for="entry">
                {{$prompt}}
            </label>
        </p>

    </div>

    <textarea wire:model="entry" id="entry" autofocus rows="4" x-ref="entry"
        class="bg-transparent rounded
             border-b p-6 text-lg lg:text-2xl w-full border-gray-800 outline-none
             dark:border-green-400 dark-focus:bg-black dark-focus:border-green-200
             focus:bg-white
             transition-all duration-150
    "></textarea>


    <p
        x-cloak
        x-show.transition="showInvalid"
        class="text-xl text-red-700 dark:text-red-500 tracking-normal"
    >
        Please enter a response before continuing.
    </p>



    <div class="flex space-x-20 text-6xl mb-10">
        <button wire:click="newPrompt"
                class="transition-all duration-150 hover:text-green-500 dark-hover:text-green-100"
        >
            <i class="fal fa-fw fa-sync"></i>
        </button>

        <button x-on:click="clear"
                class="transition-all duration-150 hover:text-green-500 dark-hover:text-green-100"
        >
            <i class="fal fa-fw fa-undo"></i>
        </button>

        <button wire:click="continue"
                class="transition-all duration-150 hover:text-green-500 dark-hover:text-green-100"
        >
            <i class="fal fa-fw fa-play"></i>
        </button>
    </div>

    <div class="mt-10">
        &nbsp;
    </div>
</div>
