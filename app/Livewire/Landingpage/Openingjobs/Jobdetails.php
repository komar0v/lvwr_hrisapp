<?php

namespace App\Livewire\Landingpage\Openingjobs;

use GuzzleHttp\Client;
use Livewire\Component;
use GuzzleHttp\Exception\RequestException;
use Livewire\WithFileUploads;

class Jobdetails extends Component
{
    use WithFileUploads;
    public $jobDetails;
    public $applicantFullName, $applicantEmail, $applicantResume;

    public function mount($jobId){
        $apiURL = env('API_URL');
        $client = new Client([
            'base_uri' => $apiURL,
        ]);

        try {
            $res1 = $client->get("api/vacancy/job/{$jobId}/detail", [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            $this->jobDetails = json_decode($res1->getBody()->getContents(), true);

        } catch (RequestException $e) {

            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = json_decode($response->getBody()->getContents());
                // dd($body);
                if($response->getStatusCode() == 404){
                    // dd($body->message);
                    abort(404);
                }
            } else {
                dd($e->getMessage());
            }
        }
    }

    public function render()
    {
        return view('livewire.landingpage.openingjobs.jobdetails')->title($this->jobDetails['title']);
    }

    public function rules()
    {
        return [
            'applicantFullName' => 'required|min:5',
            'applicantEmail' => 'required|email',
            'applicantResume' => 'required'
        ];
    }

    public function submit_job_application($jobId){
        $this->validate();

        $apiURL = env('API_URL');

        $client = new Client([
            'base_uri' => $apiURL,
            // Additional configuration options can be added here
        ]);

        try {
            //send request to API
            $res = $client->post("/api/vacancy/job/{$jobId}/apply", [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('admin_auth_data.token')
                ],
                'multipart' => [
                    [
                        'name' => 'applicant_name',
                        'contents' => $this->applicantFullName,
                    ],
                    [
                        'name' => 'applicant_email',
                        'contents' => $this->applicantEmail,
                    ],
                    [
                        'name' => 'resume_or_cv',
                        'contents' => fopen($this->applicantResume->getPathname(), 'r'),
                    ],
                ],
            ]);

            $responseData = json_decode($res->getBody()->getContents(), true);
            // dd($responseData); 
            session()->flash('response_message', $responseData);
        
            $this->redirectRoute('doneSubmitJobApplicationPage');
        } catch (RequestException $e) {

            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = json_decode($response->getBody()->getContents());

                if ($response->getStatusCode() === 422) {
                    //UNPROCESSABLE
                    //Display error in front end
                    session()->flash('error_messages', $body->errors);
                    dd($body->errors);
                } else {
                    dd($body);
                }
            } else {
                dd($e->getMessage());
            }
        }
    }
}
