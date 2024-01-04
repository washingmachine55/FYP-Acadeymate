<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class NavigationMenu extends Component
{
	public $currentTrimmedUrl;
	public $search;

	public function mount()
	{
		// $this->currentTrimmedUrl = Str::of(url()->current())->ltrim('/');
		$this->search = 'ooga booga';
	}

    public function render()
    {
        return view('navigation-menu');
    }
}
