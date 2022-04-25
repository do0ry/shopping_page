<?php

namespace Platform\Services;
use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;
use Platform\Contracts\CookieContract;

class CartService implements CookieContract
{
    static $cookieName;

    public function __construct($cookieName)
    {
        self::$cookieName = $cookieName;
    }

    public static function getFromCookie(){
        $cartId = Cookie::get(self::$cookieName);
        return Cart::idExist($cartId);
    }

    public static function getFromCookieOrCreate(){
        $cart = self::getFromCookie();
        return $cart->first() ?? (new Cart())->create();
    }

    /**
     * @inheritDoc
     */
    public static function makeCookie($id)
    {
        return Cookie::queue('cart', $id , 10);
    }

    public function countProducts(){
        $cart = $this->getFromCookie()->first();
        if ($cart != null){
            return $this->totalQuantity($cart);
        }
        return 0;
    }

    public function totalQuantity($cart){
        return $cart->products->pluck('pivot.quantity')->sum();
    }
}
