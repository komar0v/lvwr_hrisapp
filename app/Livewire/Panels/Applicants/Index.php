<?php

namespace App\Livewire\Panels\Applicants;

use GuzzleHttp\Client;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use GuzzleHttp\Exception\RequestException;

class Index extends Component
{
    #[Layout('components.layouts.panels')]
    #[Title('Applicants')]
    public $applicantsList;

    public function mount()
    {
        $apiURL = env('API_URL');
        $client = new Client([
            'base_uri' => $apiURL,
        ]);

        try {
            $res = $client->get('/api/applicant_mgmts/applicant/all', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('admin_auth_data.token')
                ],
            ]);

            $this->applicantsList = json_decode($res->getBody()->getContents(), true);
        } catch (RequestException $e) {

            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = json_decode($response->getBody()->getContents());

                if ($response->getStatusCode() === 401) {
                    //UNAUTHORIZED
                    session()->flash('error_message', $body->message . ' Silahkan login kembali.');
                    $this->redirectRoute('panelLoginPage', navigate:true);
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
        return view('livewire.panels.applicants.index');
    }
}
