<?php

namespace App\Livewire\Panels\Auth;

use GuzzleHttp\Client;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use GuzzleHttp\Exception\RequestException;

class Logout extends Component
{
    public $data;
    #[Layout('components.layouts.panels')]
    #[Title('Sampai Jumpa')]

    public function mount()
    {
        $apiURL = env('API_URL');
        $client = new Client([
            'base_uri' => $apiURL,
        ]);

        try {
            if (session('auth_data')) {
                // dd('auth_data');
                $res = $client->post('/api/account/logout', [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . session('auth_data.token')
                    ],
                ]);

                $this->data = json_decode($res->getBody()->getContents(), true);

                session()->forget('auth_data');
                session()->flush();
                session()->invalidate();
            } else if (session('admin_auth_data')) {
                // dd('admin_auth_data');
                $res = $client->post('/api/account/logout', [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . session('admin_auth_data.token')
                    ],
                ]);

                $this->data = json_decode($res->getBody()->getContents(), true);

                session()->forget('admin_auth_data');
                session()->flush();
                session()->invalidate();
            }
        } catch (RequestException $e) {

            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = json_decode($response->getBody()->getContents());

                if ($response->getStatusCode() == 401) {
                    //UNAUTHORIZED
                    session()->flash('error_message', $body->message . ' Silahkan login kembali.');
                    $this->redirectRoute('panelLoginPage');
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
        session()->forget('auth_data');
        session()->forget('admin_auth_data');
        session()->flush();
        session()->invalidate();
        return view('livewire.panels.auth.logout');
    }
}
