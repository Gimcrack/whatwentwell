<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Welcome extends Component
{
    public $theme = 'Light';

    protected $listeners = [
        'UpdatePreferences' => 'updatePreferences'
    ];

    public function mount()
    {
        $this->theme = Session::get('theme','Light');
    }

    public function render()
    {
        return view('livewire.welcome', [
            'theme' => $this->theme
        ]);
    }

    public function updatePreferences($prefs)
    {
        if ( isset($prefs['theme']) )
        {
            $this->theme = $prefs['theme'];
        }
    }
}
