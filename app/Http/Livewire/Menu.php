<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Menu extends Component
{
    public $page = 'write';

    public function mount()
    {
        $this->page = trim(request()->path(),'/') ?: 'write';
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
}
