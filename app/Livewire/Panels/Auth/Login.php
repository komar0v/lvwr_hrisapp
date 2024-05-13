<?php

namespace App\Livewire\Panels\Auth;

use GuzzleHttp\Client;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use GuzzleHttp\Exception\RequestException;

class Login extends Component
{
    #[Layout('components.layouts.panels')]
    #[Title('Panels Login')]
    public $email, $password;

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.panels.auth.login');
    }

    public function login()
    {
        $this->validate();

        $data = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        // dd($data);
        $apiURL = env('API_URL');
        $client = new Client([
            'base_uri' => $apiURL,
        ]);

        try {
            $res = $client->post('/api/login', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'json' => $data
            ]);

            $responseData = json_decode($res->getBody()->getContents(), true);
            // dd($responseData['user']['account_type']);
            if ($responseData['user']['account_type'] === "user") {
                // session(['auth_data' => $responseData]);
                // $this->redirectRoute('indexPage', navigate: true);
            } elseif ($responseData['user']['account_type'] === "superadmin") {
                session(['admin_auth_data' => $responseData]);
                $this->redirectRoute('panelDashboardPage');
            }
        } catch (RequestException $e) {

            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = json_decode($response->getBody()->getContents());

                if ($response->getStatusCode() == 401) {
                    //UNAUTHORIZED
                    session()->flash('error_message', $body->message);
                    // $this->redirectRoute('loginPage');
                } else {
                    dd($body);
                }
            } else {
                dd($e->getMessage());
            }
        }
    }
}
