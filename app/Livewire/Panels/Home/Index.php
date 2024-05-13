<?php

namespace App\Livewire\Panels\Home;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Index extends Component
{
    #[Layout('components.layouts.panels')]
    #[Title('Dashboard')]

    public function mount(){
        if(empty(session('admin_auth_data.token'))){
            session()->flash('error_message','Silahkan login kembali.');
            $this->redirectRoute('panelLoginPage', navigate:true);
        }
    }

    public function render()
    {
        return view('livewire.panels.home.index');
    }
}
