<?php

namespace App\Livewire;

use Livewire\Attributes\Validate; 
use Livewire\Component;

class Newsletter extends Component
{
    
    #[Validate('required|email')] 
    public $email;

    public function join()
    {
        $this->validate(); 
  
        return true;
    }

    public function render()
    {
        return view('livewire.newsletter');
    }
}
