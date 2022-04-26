<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Platform\Base\AuthenticatableModelBase;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends AuthenticatableModelBase
{
    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - string - contains the user primary key (id)
     * $this->attributes['first_name'] - string - contains the user first name
     * $this->attributes['last_name'] - string - contains the user last name
     * $this->attributes['phone_no'] - integer - contains the user phone number
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['password'] - string - contains the user password
     * $this->orders - Order - contains the associated order
     * $this->carts - Media - contains the associated media
     */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_no',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }

    public function getFirstName(){
        return $this->attributes['first_name'];
    }

    public function setFirstName($firstName){
        $this->attributes['first_name'] = $firstName;
    }

    public function getLastName(){
        return $this->attributes['last_name'];
    }

    public function setLastName($LastName){
        $this->attributes['last_name'] = $LastName;
    }

    public function getPhoneNo(){
        return $this->attributes['phone_no'];
    }

    public function setPhoneNo($phoneNo){
        $this->attributes['phone_no'] = $phoneNo;
    }

    public function getEmail(){
        return $this->attributes['email'];
    }

    public function setEmail($email){
        $this->attributes['email'] = $email;
    }

    public function getPassword(){
        return $this->attributes['password'];
    }

    public function setPassword($password){
        $this->attributes['password'] = $password;
    }

    public function getOrders(){
        return $this->orders;
    }

    public function setOrders($orders){
        $this->orders = $orders;
    }

    public function getMedia(){
        return $this->media;
    }

    public function setMedia($media){
        $this->media = $media;
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function media(){
        return $this->morphOne(Media::class,'mediable');
    }
}
