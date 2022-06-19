<?php

namespace App\Http\Livewire;

use App\Models\Terc;
use Livewire\Component;

class SearchTerc extends Component
{
    public $ottPlatform = '';
 
    public $terc;
    public $provider;


    public function mount()
    {
        $this->terc = Terc::where('terc.RODZ', '>', 0)
                    ->where('nts.NAZWA_DOD', '=', 'województwo')
                      ->join('nts', 'nts.WOJ', '=', 'terc.WOJ')
                      ->select('terc.*', 'nts.NAZWA as wojewodztwo')
                      ->get();
    }
    
    public function render()
    {
        return view('livewire.search-terc');
    }
}
