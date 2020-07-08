<div class="fixed bottom-0 mx-auto py-12">
    <div class="flex space-x-12 text-2xl sm:text-4xl md:text-5xl lg:text-6xl">

        <button wire:click="$set('page','write')"
                class="{{ $page == 'write' ? 'disabled text-green-500 dark:text-green-100' : '' }}
                    transition-all duration-150 hover:text-green-500 dark-hover:text-green-200"
            {{ $page == 'write' ? 'disabled' : '' }}
        >
            <i class="fal fa-fw fa-pencil"></i>
        </button>

        <button wire:click="$set('page','history')"
                class="{{ $page == 'history' ? 'disabled text-green-500 dark:text-green-100' : '' }}
                    transition-all duration-150 hover:text-green-500 dark-hover:text-green-200"
            {{ $page == 'history' ? 'disabled' : '' }}
        >
            <i class="fal fa-fw fa-history"></i>
        </button>

        <button wire:click="$set('page','settings')"
                class="{{ $page == 'settings' ? 'disabled text-green-500 dark:text-green-100' : '' }}
                    transition-all duration-150 hover:text-green-500 dark-hover:text-green-200"
            {{ $page == 'settings' ? 'disabled' : '' }}
        >
            <i class="fal fa-fw fa-user-cog"></i>
        </button>

        <button wire:click="$set('page','about')"
                class="{{ $page == 'about' ? 'disabled text-green-500 dark:text-green-100' : '' }}
                    transition-all duration-150 hover:text-green-500 dark-hover:text-green-200"
            {{ $page == 'about' ? 'disabled' : '' }}
        >
            <i class="fal fa-fw fa-question-circle"></i>
        </button>
    </div>

</div>
