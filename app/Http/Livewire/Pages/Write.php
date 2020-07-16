<?php

namespace App\Http\Livewire\Pages;

use App\Post;
use App\Prompt;
use App\Repositories\Prompts\Prompts;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Write extends Component
{
    public $entry = 'Let me tell you about it...';

    public $invalid = false;

    public $prompt;

    protected $post;

    protected $cacheKey;

    public function render()
    {
        return view('livewire.pages.write');
    }

    public function mount($prompt)
    {
        $this->prompt = $prompt;

        $this->cacheKey = "prompts." . md5($this->prompt['question']) . ".entry";

        $this->entry = Session::get($this->cacheKey, $this->currentPost()->entry);
    }

    public function updatedEntry($entry)
    {
        Session::put($this->cacheKey,$entry);
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

        if ( ! auth()->check() ) {
            Session::flash("type","warning");
            Session::flash("message","Please log in to continue");
            return redirect()->route('login');
        }

        $post = $this->currentPost();
        $post->entry = $this->entry;
        $post->save();

        Session::remove($this->cacheKey);
        $this->emit('Continue');
    }


    public function getCurrentDateProperty()
    {
        return Carbon::now()->format("r");
    }

    public function currentPost()
    {
        if ( auth()->guest() ) {
            return new Post;
        }

        return Post::firstOrNew([
            'prompt_id' => $this->prompt['id'],
            'user_id' => auth()->id(),
            'entry_date' => Carbon::now()->format('Y-m-d'),
        ]);
    }


}
