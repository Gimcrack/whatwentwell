<div x-data="{
    showMenu : false

}" class="fixed bottom-0 mx-auto" @click.away="showMenu=false" @click="showMenu=true">
    <div class="flex flex-col items-center justify-center text-2xl sm:text-4xl md:text-5xl lg:text-6xl" >
        <div x-show="! showMenu"
             class="cursor-pointer p-1 rounded-t-lg bg-gray-800 dark:bg-green-500 text-gray-100 dark:text-gray-900 text-3xl"
             x-transition:enter="transition ease-in delay-100 duration-100"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-out delay-0 duration-0"
            x-transition:leave-start="opacity-0"
            x-transition:leave-end="opacity-0"
        >
            <i class="fal fa-fw fa-ellipsis-h"></i>
        </div>
        <div x-cloak x-show="showMenu"
            class="flex justify-center space-x-12 duration-100 rounded-t-lg bg-gray-100 dark:bg-gray-800 p-10 border-t-2 border-green-500"
            x-transition:enter="transition transform ease-in"
            x-transition:enter-start="translate-y-20 scale-50"
            x-transition:enter-end="translate-y-0 scale-100"
            x-transition:leave="transition transform ease-out"
            x-transition:leave-start="translate-y-0 scale-100"
            x-transition:leave-end="translate-y-20 scale-50"

        >
            <button wire:click="$set('page','write')"
                    class="{{ $page == 'write' ? 'disabled text-green-500 dark:text-green-100' : '' }}
                        transition-all duration-150 hover:text-green-500 dark-hover:text-green-200 transform hover:scale-150"
                {{ $page == 'write' ? 'disabled' : '' }}
            >
                <i class="fal fa-fw fa-pencil"></i>
            </button>

            <button wire:click="$set('page','history')"
                    class="{{ $page == 'history' ? 'disabled text-green-500 dark:text-green-100' : '' }}
                        transition-all duration-150 hover:text-green-500 dark-hover:text-green-200 transform hover:scale-150"
                {{ $page == 'history' ? 'disabled' : '' }}
            >
                <i class="fal fa-fw fa-history"></i>
            </button>

            <button wire:click="$set('page','settings')"
                    class="{{ $page == 'settings' ? 'disabled text-green-500 dark:text-green-100' : '' }}
                        transition-all duration-150 hover:text-green-500 dark-hover:text-green-200 transform hover:scale-150"
                {{ $page == 'settings' ? 'disabled' : '' }}
            >
                <i class="fal fa-fw fa-user-cog"></i>
            </button>

            <button wire:click="$set('page','about')"
                    class="{{ $page == 'about' ? 'disabled text-green-500 dark:text-green-100' : '' }}
                        transition-all duration-150 hover:text-green-500 dark-hover:text-green-200 transform hover:scale-150"
                {{ $page == 'about' ? 'disabled' : '' }}
            >
                <i class="fal fa-fw fa-question-circle"></i>
            </button>

            <button wire:click="changeTheme"
                    class="transition-all duration-150 hover:text-green-500 dark-hover:text-green-200 transform hover:scale-150"
            >
                <i class="fa-fw {{ $theme === 'Dark' ? 'fas fa-lightbulb' : 'fal fa-lightbulb-on' }}"></i>
            </button>
        </div>
    </div>

</div>
