<?php

namespace App\Http\Controllers;

// use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    public function store( OrderDetails $orderDetails, PaymentGatewayContract $paymentGateway) 
    {
        // $paymentGateway = new PaymentGateway('usd');

        $order = $orderDetails->all(); 
        // dd( $paymentGateway->charge(4000));
        // dd($order);
        $paymentGateway->setDiscount(3100);
        $payment = $paymentGateway->charge(4000);

        $result = [
            'nama' => $order['name'],
            'alamat' => $order['address'],
            'jumlah_tagihan' => $payment['amount'],
            'confirmation_number' => $payment['confirmation_number'],
            'mata_uang' => $payment['currency'],
            'diskon' => $payment['discount'] 
        ];

        dd($result);

    }
}
