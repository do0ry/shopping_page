<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Platform\Contracts\CookieContract;

class OrderFunctions extends Component
{
    use AuthorizesRequests;
    private $carService;
    public $cartProducts;
    public $cart;

    public function mount(){
        $this->carService = resolve(CookieContract::class);
        $this->cartProducts = $this->carService->getFromCookie()->first()->products;
        $this->cart =  $this->carService->getFromCookie()->first();
    }

    public function store(){
        $this->mount();
        $order = Order::saveData([
            'user_id'=>Auth::user()->id,
            'status'=>'pending'
            ]);

        $cartProductWithQuantity = $this->cart->products->mapWithKeys(function($product){
            $element[$product->id] = ['quantity'=>$product->pivot->quantity];
            return $element;
        });

        $order->products()->attach($cartProductWithQuantity->toArray());
        return redirect()->to("/payment/{$order->id}");
    }

    public function render()
    {
        return view('livewire.order-functions');
    }
}
