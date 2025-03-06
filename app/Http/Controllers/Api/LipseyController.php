<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\LipseyService;
class LipseyController extends Controller
{

    protected $lipseyService;

    public function __construct(LipseyService $lipseyService) {
        $this->lipseyService = $lipseyService;
    }
    
    public function apilogin(){
        try {
         
        $val=$this->lipseyService->ApiLogin();
        return response()->json($val);
           //code...
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function createorder()
{
    try {
        // Dummy data to mimic what a real request might look like
        $customer_data = [
            'PONumber' => 'PO123456',  // Purchase Order Number
            'ItemNo' => 'RU1022RB',    // Item Number
            'Quantity' => 2,           // Quantity
            'Note' => 'Urgent order'   // Optional note for the order
        ];

        // Call the LipseyService's CreateOrder method and pass the dummy data
        $val = $this->lipseyService->CreateOrder($customer_data);

        // Return the response as JSON
        return response()->json($val);

    } catch (\Throwable $th) {
        // If there's an error, catch the exception and return the error message
        return response()->json(['error' => $th->getMessage()], 500);
    }
}

}
