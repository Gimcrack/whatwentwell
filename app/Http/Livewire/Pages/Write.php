<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Write extends Component
{
    public $entry = 'Let me tell you about it...';

    public $prompt = 'What went well today?';

    public $prompts = [
        'What went well today?',
        'What could have gone better?',
        'What did you accomplish?',
        'What did you decide?'
    ];

    public $promptIndex = 0;

    public $invalid = false;

    public function render()
    {
        return view('livewire.pages.write');
    }

    public function mount()
    {
        $this->entry = Session::get('entry');
    }

    public function updatedEntry($entry)
    {
        Session::put('entry',$entry);
        $this->invalid = false;
    }

    public function clearEntry()
    {
        $this->entry = '';
        $this->updatedEntry($this->entry);
    }

    public function continue()
    {
        if ( strlen($this->entry) < 10 ) {
            $this->invalid = true;
            $this->emit('ShowInvalid');
            return;
        }
    }

    public function newPrompt()
    {
        $this->promptIndex++;

        if ( $this->promptIndex >= count($this->prompts) )
            $this->promptIndex = 0;

        $this->prompt = $this->prompts[$this->promptIndex];
    }
}
