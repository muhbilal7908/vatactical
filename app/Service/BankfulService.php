<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class BankfulService
{
  

    public function createToken($customerDetails)
    {
        $baseUri = 'https://api.paybybankful.com/api/integration/customer/card-tokenization';
        
        // Prepare headers
        $headers = [
            'Content-Type' => 'application/json',
            'Cache-Control' => 'no-cache',
        ];
    
        // Prepare data for the request
        $data = [
            'req_username' => config('bankful.username'),
            'req_password' => config('bankful.password'),
            'customer_details' => [
                'first_name' => $customerDetails['first_name'],
                'last_name' => $customerDetails['last_name'],
                'address_1' => $customerDetails['address'],
                'address_2' => $customerDetails['address_2'],
                'city' => $customerDetails['city'],
                'state' => $customerDetails['state'],
                'zip' => $customerDetails['postal_code'],
                'country' => $customerDetails['country'],
                'email' => $customerDetails['email'],
            ],
            'card_details' => [
                'card_number' => $customerDetails['cardnumber'],
                'card_exp_mm' => $customerDetails['expire_month'],
                'card_exp_yy' => $customerDetails['expire_year'],
                'card_cvv' => $customerDetails['cvv'],
            ],
        ];
    
        // Make the POST request
        $response = Http::withHeaders($headers)->post($baseUri, $data);
    
        // Debugging response
       
        // Check for successful response
        if ($response->successful()) {
            $data=$response->json();
            $customerVaultId = $data['data']['customer_vault_id'];
            return $customerVaultId;
        } else {
            // Handle error
            throw new \Exception('Error creating token: ' . $response->body());
        }
    }
    

public function transaction($customer_data){

    $expire = $customer_data->expire_month . "/20" . $customer_data->expire_year;

    $headers = [
        'Content-Type' => 'application/x-www-form-urlencoded',
        'cache-control' => 'no-cache',
    ];

    $data = [
        'req_username' => config('bankful.username'),
        'req_password' => config('bankful.password'),
        'amount' => $customer_data->total,
        'request_currency' => 'USD',
        'cust_phone' => $customer_data->phone_no,
        'transaction_type' => 'CAPTURE',
        'customer_vault_id' => $customer_data->token, // Use the customer vault ID from the token
        'bill_addr' => $customer_data->address,
        'bill_addr_city' => $customer_data->city,
        'bill_addr_country' => $customer_data->country,
        'bill_addr_state' => $customer_data->state,
        'bill_addr_zip' => $customer_data->postal_code,
        'cust_email' => $customer_data->email,
        'cust_fname' => $customer_data->first_name,
        'cust_lname' => $customer_data->last_name
    ];

    $response = HTTP::post('https://api.paybybankful.com/api/transaction/api', $data);
    $responseData = $response->json();

    $transactionStatus = $responseData['TRANS_STATUS_NAME'];

    return $transactionStatus;
    
}


}