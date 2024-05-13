<?php

namespace App\Livewire\Panels\Vacancy;

use GuzzleHttp\Client;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use GuzzleHttp\Exception\RequestException;

class Jobdetails extends Component
{
    #[Layout('components.layouts.panels')]
    #[Title('Jobs Details')]
    public $jobData;
    public $jobTitle, $jobDescription, $jobRequirements, $jobCity, $jobDivisions;

    public function mount($jobId){
        $apiURL = env('API_URL');
        $client = new Client([
            'base_uri' => $apiURL,
        ]);

        try {
            $res = $client->get("/api/job_mgmts/job/$jobId/details", [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('admin_auth_data.token')
                ],
            ]);

            $this->jobData = json_decode($res->getBody()->getContents(), true);
        } catch (RequestException $e) {

            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = json_decode($response->getBody()->getContents());

                if ($response->getStatusCode() === 401) {
                    //UNAUTHORIZED
                    session()->flash('error_message', $body->message . ' Silahkan login kembali.');
                    $this->redirectRoute('panelLoginPage', navigate:true);
                }else if($response->getStatusCode() === 404){
                    session()->flash('toastr_message', 'toastr.error("'.$body->message.'","Error");');
                    $this->redirectRoute('panelApplicantsIndexPage');
                } else {
                    dd($body);
                }
            } else {
                dd($e->getMessage());
            }
        }
    }
    
    public function render()
    {
        $this->jobTitle=$this->jobData['title'];
        $this->jobDescription=$this->jobData['description'];
        $this->jobRequirements=json_decode($this->jobData['requirements']);
        $this->jobCity=$this->jobData['cities'];
        $this->jobDivisions=$this->jobData['divisions'];
        return view('livewire.panels.vacancy.jobdetails');
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

    public function updateJobData($jobId){
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
            $res = $client->post("/api/job_mgmts/job/$jobId/update", [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('admin_auth_data.token')
                ],
                'json' => $data
            ]);

            $responseData = json_decode($res->getBody()->getContents(), true);
            // dd($responseData); 
            session()->flash('toastr_message', 'toastr.success("Job details '.$responseData['job_title'].' update","Success");');
        
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
