<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class LipseyService
{
    protected $email;
    protected $password;
    protected $base_url;

    public function __construct() {
        $this->email = env('LIPSEY_EMAIL');
        $this->password = env('LIPSEY_PASSWORD');
        $this->base_url = env("LIPSEY_URL");
    }

    public function ApiLogin()
    {
       
        $client = new Client();
        
        $headers = [
            'Content-Type' => 'application/json'
        ];

        $body = json_encode([
            'Email' => $this->email,
            'Password' => $this->password
        ]);

        $request = new Request('POST', $this->base_url.'/api/Integration/Authentication/Login', $headers, $body);
        $response = $client->send($request);
        
        return json_decode($response->getBody(), true);  // Assuming it returns a token
    }

    public function CreateOrder($customer_data)
    {
        $loginResponse = $this->ApiLogin();
        $token = $loginResponse['Token'] ?? null;

        if (!$token) {
            throw new \Exception('Authentication failed. No token received.');
        }

        $client = new Client();
        
        $headers = [
            'Content-Type' => 'application/json',
            'Token' => $token  // Use the token from the login response
        ];

        $body = json_encode([
            'PONumber' => $customer_data['PONumber'] ?? 'PoNumber',
            'EmailConfirmation' => true,
            'Items' => [
                [
                    'ItemNo' => $customer_data['ItemNo'] ?? 'RU1022RB',
                    'Quantity' => $customer_data['Quantity'] ?? 1,
                    'Note' => $customer_data['Note'] ?? 'Test'
                ]
            ]
        ]);

        $request = new Request('POST', $this->base_url.'/api/integration/order/apiorder', $headers, $body);
        $response = $client->send($request);

        return $response->getBody();
    }
}
