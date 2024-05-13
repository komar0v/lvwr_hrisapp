<?php

namespace App\Livewire\Panels\System;

use GuzzleHttp\Client;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use GuzzleHttp\Exception\RequestException;

class Log extends Component
{
    #[Layout('components.layouts.panels')]
    #[Title('System Log')]
    public $sysLog;

    public function mount(){
        $apiURL = env('API_URL');
        $client = new Client([
            'base_uri' => $apiURL,
        ]);

        try {
            $res = $client->get('/api/sys/log/get_log', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('admin_auth_data.token')
                ],
            ]);

            $this->sysLog = json_decode($res->getBody()->getContents(), true);
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
        $this->mount();
        return view('livewire.panels.system.log');
    }

    public function clearSystemLog(){
        $apiURL = env('API_URL');
        $client = new Client([
            'base_uri' => $apiURL,
        ]);

        try {
            $res = $client->post("/api/sys/log/clear_log", [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('admin_auth_data.token')
                ],
            ]);

            $responseData = json_decode($res->getBody()->getContents(), true);
            
            session()->flash('toastr_message', 'toastr.success("'.$responseData['message'].'","Done");');
            $this->redirectRoute('panelSystemLogViewerPage');
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
