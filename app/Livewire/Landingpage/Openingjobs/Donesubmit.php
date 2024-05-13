<?php

namespace App\Livewire\Landingpage\Openingjobs;

use Livewire\Component;
use Livewire\Attributes\Title;

class Donesubmit extends Component
{
    #[Title('Job Application Submited')]

    public $responseData;
    public function mount(){
        if(session('response_message')){
            $this->responseData= session('response_message');
        }else{
            $this->redirectRoute('jobsPage', navigate:true);
        }

        
    }

    public function render()
    {
        return view('livewire.landingpage.openingjobs.donesubmit');
    }
}
