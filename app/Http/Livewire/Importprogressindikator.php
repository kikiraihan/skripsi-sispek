<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Importprogressindikator extends Component
{
    public $progressimport=0;


    protected $listeners=[
        'resetProgressImport'=>'resetProgress',
        'tambahProgressImport'=>'naikanProgress',
    ];

    public function updatingProgressimport()
    {
        $this->resetPage();
    }

    public function updatedProgressimport($value)
    {
        $this->resetPage();
    }

    public function resetProgress()
    {
        $this->reset();
        $this->mount();
    }

    public function naikanProgress()
    {
        $this->progressimport++;
        $this->mount();
    }

    public function getProgressimportAttribute()
    {
        return ($this->progressimport/5)*100;
    }

    public function render()
    {
        return view('livewire.importprogressindikator');
    }
}
