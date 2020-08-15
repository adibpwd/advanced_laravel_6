<?php

namespace App\Http\Controllers;

// use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;
// use App\Orders\OrderDetails;
use Illuminate\Http\Request;
use App\Cloudinary\CloudinaryInterface;
use App\Cloudinary\PostGateway;
use App\Cloudinary\TestClass;

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

        return view('welcome', compat('result'));


    }

    public function testing(CloudinaryInterface $jajal) {
        // $jajal = new CloudinaryInterface();
        // $jajal = new PostGateway(); 

        // $result = $jajal->result('hello world');
        $result = $jajal->upload('adib orang purwodadi');
        dd($result);
    }
}
