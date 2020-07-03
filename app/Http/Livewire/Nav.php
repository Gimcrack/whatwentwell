<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Nav extends Component
{
    public $theme = 'Light';

    public function mount()
    {
        $this->theme = Session::get('theme','Light');
    }

    public function render()
    {
        return view('livewire.nav');
    }

    public function updatedTheme($theme)
    {
        Session::put('theme',$theme);
        $this->emit('UpdatePreferences',compact('theme'));
    }
}
