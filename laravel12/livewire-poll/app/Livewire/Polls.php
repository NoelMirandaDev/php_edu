<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Livewire\Attributes\On;
use Livewire\Component;

class Polls extends Component
{
    public function render()
    {
        $polls = Poll::with('options.votes')
            ->latest()->get();

        return view('livewire.polls', ['polls' => $polls]);
    }

    #[On('pollCreated')]
    public function refresh()
    {
        // This method is intentionally left blank. It exists to allow manual refreshes if needed.
    }

    public function vote(Option $option)
    {
        $option->votes()->create();
    }
}
