<?php

namespace App\Http\Livewire;

use App\Repositories\Preferences\Facades\Preferences;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Menu extends Component
{
    public $page = 'write';

    public $theme = 'Dark';

    public function mount()
    {
        $this->page = trim(request()->path(),'/') ?: 'write';
        $this->theme = Preferences::get('theme');
    }

    public function render()
    {
        return view('livewire.menu');
    }

    public function navigate($page)
    {
        $this->page = $page;
    }

    public function updatedPage($page)
    {
        $this->emit('Navigate',$page);
    }


    public function changeTheme()
    {
        $theme = ( $this->theme === 'Light' ) ? 'Dark' : 'Light';

        $this->theme = $theme;

        Preferences::set('theme',$this->theme);

        $this->emit('UpdatePreferences',compact('theme'));
    }
}
