<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Menu extends Component
{
    public $page = 'write';

    public $theme = 'Dark';

    public function mount()
    {
        $this->page = trim(request()->path(),'/') ?: 'write';
        $this->theme = Session::get('theme','Light');
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

        Session::put('theme',$theme);
        $this->emit('UpdatePreferences',compact('theme'));
    }
}
