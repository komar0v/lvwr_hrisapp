<?php

namespace App\Livewire\Landingpage\Openingjobs;

use GuzzleHttp\Client;
use Livewire\Component;
use Livewire\Attributes\Title;
use GuzzleHttp\Exception\RequestException;

class Jobs extends Component
{
    #[Title('Jobs')]
    public $jobList;
    
    public function mount(){
        $apiURL = env('API_URL');
        $client = new Client([
            'base_uri' => $apiURL,
        ]);

        try {
            $res1 = $client->get('api/vacancy/job/all', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            $this->jobList = json_decode($res1->getBody()->getContents(), true);
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
        return view('livewire.landingpage.openingjobs.jobs');
    }
}
