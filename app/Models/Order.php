<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['status'] - text - contains the product description
     * $this->attributes['user_id'] - integer - contains the price
     * $this->attributes['order_id'] - integer - contains the stuck
     * $this->orders - Order - contains the associated order
     * $this->carts - Cart - contains the associated cart
     */
    use HasFactory;
    protected $fillable=[
      'status',
      'user_id',
    ];

    public function setStatus($status)
    {
        $this->attributes['status'] = $status;
    }

    public function getStatus()
    {
        return $this->attributes['status'];
    }

    public function setUserId($userId){
        $this->attributes['user_id'] = $userId;
    }

    public function getUserId(){
        return $this->attributes['user_id'];
    }

    public function order(){
        return $this->hasOne(order::class);
    }
    public function products(){
        return $this->morphToMany(Product::class,'productable')
            ->withPivot('quantity');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function saveData(array $data){
        $obtainedOrder = Order::setAttributes($data);
        return Order::create([
            'status'=>$obtainedOrder->getStatus(),
            'user_id'=>$obtainedOrder->getUserId(),
        ]);
    }

    private static function setAttributes(array $data){
        $order = new Order();
        $order->setStatus($data['status'] ?? 'pending');
        $order->setUserId($data['user_id']);
        return $order;
    }

    public function getTotalPriceAttribute(){
        return $this->products()->get()->pluck('totalPrice')->sum();
    }
}
