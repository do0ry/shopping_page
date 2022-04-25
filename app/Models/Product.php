<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['title'] - string - contains the product name
     * $this->attributes['description'] - text - contains the product description
     * $this->attributes['price'] - integer - contains the price
     * $this->attributes['stock'] - integer - contains the stuck
     * $this->attributes['status'] - string - contains the product Availability status
     * $this->orders - Order - contains the associated order
     * $this->carts - Cart - contains the associated cart
     * $this->users - User - contains the associated user
     */

    use HasFactory;

    protected $fillable = [
       'title',
       'description',
       'price',
       'stock',
       'status',
    ];

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }

    public function getTitle(){
        return $this->attributes['title'];
    }

    public function setTitle($title){
        $this->attributes['title'] = $title;
    }

    public function getDescription(){
        return $this->attributes['description'];
    }

    public function setDescription($description){
        $this->attributes['description'] = $description;
    }

    public function getPrice(){
        return $this->attributes['price'];
    }

    public function setPrice($price){
        $this->attributes['price'] = $price;
    }

    public function getStock(){
        return $this->attributes['stock'];
    }

    public function setStock($stock){
        $this->attributes['stock'] = $stock;
    }

    public function getStatus(){
        return $this->attributes['status'];
    }

    public function setStatus($status){
        $this->attributes['status'] = $status;
    }

    public function getMedias(){
        return $this->medias;
    }

    public function setMedias($medias){
        $this->medias = $medias;
    }

    public function getOrders(){
        return $this->orders;
    }

    public function setOrders($orders){
        $this->orders = $orders;
    }

    public function getCarts(){
        return $this->carts;
    }

    public function setCarts($carts){
        $this->carts = $carts;
    }

    public function getUsers(){
        return $this->users;
    }

    public function setUsers($users){
        $this->users = $users;
    }

    public function medias(){
        return $this->morphMany(Media::class,'mediable');
    }

    public function orders(){
        return $this->morphedByMany(Order::class,'productable');
    }

    public function carts(){
        return $this->morphedByMany(Cart::class,'productable');
    }

    public function users(){
        return $this->morphedByMany(User::class,'productable');
    }

    public function getTotalPriceAttribute(){
        return $this->getPrice() * $this->pivot->quantity;
    }
}
