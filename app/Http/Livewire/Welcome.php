<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Welcome extends Component
{
    public $theme = 'Dark';

    public $page = 'write';

    protected $listeners = [
        'UpdatePreferences' => 'updatePreferences',
        'Navigate' => 'navigate'
    ];

    public function mount()
    {
        $this->theme = Session::get('theme','Light');
        $this->page = trim(request()->path(),'/') ?: 'write';
    }

    public function render()
    {
        return view('livewire.welcome');
    }

    public function updatePreferences($prefs)
    {
        if ( isset($prefs['theme']) )
        {
            $this->theme = $prefs['theme'];
        }
    }

    public function navigate($page)
    {
        $this->page = $page;
    }
}
