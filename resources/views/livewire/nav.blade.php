<nav class="fixed top-0 left-0 h-16 w-full flex items-center">
    <div class="flex m-4 text-base">
        <i wire:click="changeTheme" class="w-10 text-3xl text-center cursor-pointer {{ $theme === 'Dark' ? 'fas fa-lightbulb' : 'fal fa-lightbulb-on' }}"></i>
    </div>
    <div class="flex flex-1"></div>
</nav>
