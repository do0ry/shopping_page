<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Platform\Contracts\CookieContract;

class CartContents extends Component
{
    public $cart;
    private $cartService;

    public function mount(CookieContract $cartService){
        $this->cartService = $cartService;
        $this->cart = $this->getCart($cartService);
    }

    public function quantity($quantity,$productId,CookieContract $cartService){
        if ($quantity == 0){
            return $this->productDetaching($productId,$cartService);
        }
        $cart = $cartService->getFromCookieOrCreate()->first();
        $cart->products()->syncWithoutDetaching([
            $productId => ['quantity'=>$quantity]
        ]);
        $cartService->makeCookie($cart->id);
        $this->cart = $this->getCart($cartService);
    }

    public function productDetaching($productId,CookieContract $cartService){
        $cart = $cartService->getFromCookieOrCreate()->first();
        $cart->products()->detach([
            $productId
        ]);
        $this->cart = $this->getCart($cartService);
    }

    public function getCart(CookieContract $cartService){
        if($cartService->getFromCookie()->isEmpty()){
            return $cartService->getFromCookie();
        }
        return $cartService->getFromCookie()->first()->products()->get();
    }

    public function render()
    {
        return view('livewire.cart-contents');
    }
}
