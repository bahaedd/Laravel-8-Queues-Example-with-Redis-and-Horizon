<?php

namespace App\Http\Controllers;

use App\Jobs\SendOrderEmail;
use App\Mail\OrderShipped;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class MailController extends Controller
{
    public function index()
    {
        $order = Order::findOrFail(rand(1,50));

        // $recipient = 'sihassi.bahaeddine@gmail.com';
        // Mail::to($recipient)->send(new OrderShipped($order));
        // return 'Sent Order'. $order->id;

        // SendOrderEmail::dispatch($order);
        // Log::info('Dispatched order ' . $order->id);
        // return 'Dispatched order ' . $order->id;

        for ($i=0; $i<20; $i++) { 

            $order = Order::findOrFail( rand(1,50) ); 
              SendOrderEmail::dispatch($order)->onQueue('email');
                
            }
    
            return 'Dispatched orders';
        
    }
}
