<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * PAYMENT ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['amount'] - float - contains the payment amount
     * $this->attributes['payed_at'] - timestamp - contains the orders payed time
     * $this->attributes['order_id'] - integer - contains the payment order id
     * $this->orders - Order - contains the associated order
     */
    use HasFactory;

    protected $fillable = [
        'id',
        'amount',
        'payed_at',
        'order_id',
    ];

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }

    public function getAmount(){
        return $this->attributes['amount'];
    }

    public function setAmount($amount){
        $this->attributes['amount'] = $amount;
    }

    public function getPayedAt(){
        return $this->attributes['payed_at'];
    }

    public function setPayedAt($payedAt){
        $this->attributes['payed_at'] = $payedAt;
    }

    public function getOrderId(){
        return $this->attributes['order_id'];
    }

    public function setOrderId($orderId){
        $this->attributes['order_id'] = $orderId;
    }

    public function payment(){
        return $this->hasOne(order::class);
    }


}
