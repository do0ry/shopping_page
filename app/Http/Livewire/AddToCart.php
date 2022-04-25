<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Platform\Contracts\CookieContract;
use Symfony\Component\HttpKernel\EventListener\ValidateRequestListener;

class AddToCart extends Component
{
    public $products;

    public function mount(CookieContract $cartService){
        $this->products = Product::with('medias')->get();
    }
    public function store($product,CookieContract $cartService){
        $cart = $cartService->getFromCookieOrCreate()->first();
        $quantity = $cart->products()
                ->find($product)
                ->pivot
                ->quantity ?? 0;
//        $cart->products()->attach([
//            $product => ['quantity'=>$quantity+1]
//        ]);
        $cart->products()->syncWithoutDetaching([
            $product => ['quantity'=>$quantity+1]
        ]);
        $cartService->makeCookie($cart->id);
//        $cookie = Cookie::queue(Cookie::make('cart',$cart->id,7*24*60));
//        Cookie::queue('cart',$cart->id,7*24*60);
        return Redirect::to('/');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
