<?php

namespace App\Http\Livewire;

use App\Mail\PurchaseConfirmed;
use App\Models\Order;
use App\Models\Payment as pay;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Platform\Contracts\CookieContract;

class Payment extends Component
{
    public $order;
    public $cardNumber;
    public $cardHolder;
    public $month;
    public $year;
    public $securityNumber;
    protected $cartService;
    public function mount(){
        $this->cartService = resolve(CookieContract::class);
    }

    public function store()
    {
        $this->mount();
//       $confirmation = paymentService::pay()
        $order = Order::find($this->order);
        $payment = pay::create([
            'payed_at'=>now(),
            'amount'=>$order->totalPrice,
            'order_id'=>$order->id
        ]);
        $order->setStatus('payed');
        $order->save();
        $this->cartService->getFromCookie()->first()->products()->detach();
        Mail::to($order->user)->send(new PurchaseConfirmed($order));
        return redirect()->to('/');
    }
    public function render()
    {
        return view('livewire.payment');
    }
}
