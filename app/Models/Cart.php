<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Parent_;
use Platform\Exceptions\CartDoesNotExist;

class Cart extends Model
{
    /**
     * CART ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->products - Product - contains the associated product
     */
    use HasFactory;

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }

    public function getProducts(){
        return $this->products;
    }

    public function setProducts($products){
        $this->products = $products;
    }

    public function products(){
        return $this->morphToMany(Product::class, 'productable')
            ->withPivot('quantity');
    }

    public static function idExist($id)
    {
        $cart = static::whereId($id)->get();

        if (! $cart) {
            throw CartDoesNotExist::withId($id);
        }

        return $cart;
    }

    public function getTotalPriceAttribute(){
        return $this->products()->get()->pluck('totalPrice')->sum();
    }

    public static function saveData(){
        $order = new Order();
        return Order::create();
    }

    public static function boot(){
        parent::boot();
        static::deleting(function(){
            return 'lolo';
        });
    }

}
