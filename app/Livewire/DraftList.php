<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Work;
class DraftList extends Component
{
    public $works;
    public $pageTitle;

    public function render()
    {
        $this->works=Work::all();
        return view('livewire.draft-list');
    }
}
