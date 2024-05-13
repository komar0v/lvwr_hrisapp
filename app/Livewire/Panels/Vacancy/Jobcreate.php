<?php

namespace App\Livewire\Panels\Vacancy;

use GuzzleHttp\Client;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use GuzzleHttp\Exception\RequestException;

class Jobcreate extends Component
{
    #[Layout('components.layouts.panels')]
    #[Title('Create New Jobs Opening')]
    public $jobTitle, $jobDescription, $jobRequirements, $jobCity, $jobDivisions;

    public function mount(){
        if(empty(session('admin_auth_data.token'))){
            session()->flash('error_message','Silahkan login kembali.');
            $this->redirectRoute('panelLoginPage', navigate:true);
        }
    }

    public function render()
    {
        return view('livewire.panels.vacancy.jobcreate');
    }
    
    public function rules(){
        return [
            'jobTitle' => 'required',
            'jobDescription' => 'required',
            'jobRequirements' => 'required',
            'jobCity' => 'required',
            'jobDivisions' => 'required',
        ];
    }

    public function saveJobData(){
        $this->validate();

        $data=[
            'title'=>$this->jobTitle,
            'requirements'=>$this->jobRequirements,
            'description'=>$this->jobDescription,
            'cities'=>$this->jobCity,
            'divisions'=>$this->jobDivisions,
        ];

        $apiURL = env('API_URL');
        $client = new Client([
            'base_uri' => $apiURL,
        ]);

        try {
            //send request to API
            $res = $client->post("/api/job_mgmts/job/create", [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('admin_auth_data.token')
                ],
                'json' => $data
            ]);

            $responseData = json_decode($res->getBody()->getContents(), true);
            // dd($responseData); 
            session()->flash('toastr_message', 'toastr.success("'.$responseData['message'].'","Success");');
        
            $this->redirectRoute('panelVacancyJobsIndexPage', navigate:true);
        } catch (RequestException $e) {

            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = json_decode($response->getBody()->getContents());

                if ($response->getStatusCode() === 422) {
                    //UNPROCESSABLE
                    //Display error in front end
                    session()->flash('error_messages', $body->errors);
                } else {
                    dd($body);
                }
            } else {
                dd($e->getMessage());
            }
        }
    }
}
