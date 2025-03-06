<?php
use App\Models\Transection;

function insertTransection($user_id, $amount, $payment_method, $msg) {
    try {
        $data = Transection::create([
            'user_id' => $user_id,
            'amount' => $amount,
            'payment_method' => $payment_method,
            'msg' => $msg
        ]);
        return $data;
    } catch (\Throwable $th) {
        return $th->getMessage();
    }
}


