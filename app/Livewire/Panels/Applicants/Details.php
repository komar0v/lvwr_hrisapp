<?php

namespace App\Livewire\Panels\Applicants;

use GuzzleHttp\Client;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use GuzzleHttp\Exception\RequestException;

class Details extends Component
{
    #[Layout('components.layouts.panels')]
    #[Title('Applicant Detail')]
    public $applicantData;

    public function mount($applicantId){
        $apiURL = env('API_URL');
        $client = new Client([
            'base_uri' => $apiURL,
        ]);

        try {
            $res = $client->get("/api/applicant_mgmts/applicant/{$applicantId}/details", [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('admin_auth_data.token')
                ],
            ]);

            $this->applicantData = json_decode($res->getBody()->getContents(), true);
            
        } catch (RequestException $e) {

            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = json_decode($response->getBody()->getContents());

                if ($response->getStatusCode() === 401) {
                    //UNAUTHORIZED
                    session()->flash('error_message', $body->message . ' Silahkan login kembali.');
                    $this->redirectRoute('panelLoginPage');
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
        return view('livewire.panels.applicants.details');
    }

    public function downloadResume($applicantId){
        $apiURL = env('API_URL');
        $client = new Client([
            'base_uri' => $apiURL,
        ]);

        try {
            $res = $client->get("/api/applicant_mgmts/applicant/{$applicantId}/download_resume", [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('admin_auth_data.token')
                ],
            ]);

            $fileContent = $res->getBody()->getContents();
            $tempFilePath = tempnam(sys_get_temp_dir(), 'downloaded-file-');
            file_put_contents($tempFilePath, $fileContent);

            return response()->download($tempFilePath, 'resume-'.$applicantId.'.pdf')->deleteFileAfterSend(true);
            
        } catch (RequestException $e) {

            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = json_decode($response->getBody()->getContents());

                if ($response->getStatusCode() === 401) {
                    //UNAUTHORIZED
                    session()->flash('error_message', $body->message . ' Silahkan login kembali.');
                    $this->redirectRoute('panelLoginPage');
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

    public function manualProcessResume($applicantId){
        $apiURL = env('API_URL');
        $client = new Client([
            'base_uri' => $apiURL,
        ]);

        try {
            $res = $client->post("/api/applicant_mgmts/applicant/{$applicantId}/manual_process", [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('admin_auth_data.token')
                ],
            ]);

            $this->applicantData = json_decode($res->getBody()->getContents(), true);
            
            session()->flash('toastr_message', 'toastr.success("Application Has Been Processed","Done");');
            $this->redirectRoute('panelApplicantsDetailsPage', ['applicantId'=>$applicantId]);
        } catch (RequestException $e) {

            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = json_decode($response->getBody()->getContents());

                if ($response->getStatusCode() === 401) {
                    //UNAUTHORIZED
                    session()->flash('error_message', $body->message . ' Silahkan login kembali.');
                    $this->redirectRoute('panelLoginPage');
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
}
