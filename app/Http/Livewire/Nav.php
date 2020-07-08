<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Nav extends Component
{
    public $theme = 'Dark';

    public function mount()
    {
        $this->theme = Session::get('theme','Light');
    }

    public function render()
    {
        return view('livewire.nav');
    }

    public function changeTheme()
    {
        $theme = ( $this->theme === 'Light' ) ? 'Dark' : 'Light';

        $this->theme = $theme;

        Session::put('theme',$theme);
        $this->emit('UpdatePreferences',compact('theme'));
    }
}
