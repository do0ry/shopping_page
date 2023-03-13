<?php

namespace App\Models;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /**
     * CHAT ATTRIBUTES
     * $this->attributes['id'] - int - contains the chat primary key
     * $this->attributes['massage'] - string - contains the chat massage
     * $this->attributes['receiver_user_id'] - int - contains the chat receiver id
     * $this->attributes['user_id'] - int - contains the chat foreign key
     */
    use HasFactory;

    protected $fillable = [
        'massage',
        'receiver_user_id',
        'massage_time',
        'user_id',
    ];

//    protected $dateFormat = [
//        'massage_time'
//    ];
    private $id;

    private $massage;

    private $receiver_user_id;

    private $user_id;

    private $massage_time;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->attributes['id'];
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    /**
     * @return string
     */
    public function getMassage()
    {
        return $this->attributes['massage'];
    }

    /**
     * @param mixed $massage
     */
    public function setMassage($massage)
    {
        $this->attributes['massage'] = $massage;
    }

    /**
     * @return int
     */
    public function getReceiverUserId()
    {
        return $this->attributes['receiver_user_id'];
    }

    /**
     * @param mixed $receiver_user_id
     */
    public function setReceiverUserId($receiver_user_id)
    {
        $this->attributes['receiver_user_id'] = $receiver_user_id;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function saveData(array $request){
        $chat = new Chat();
        $chatData = $chat->setAttributes($request, $chat);
        $chat->create([
            'massage'=>$chatData->getMassage(),
            'receiver_user_id'=>$chatData->getReceiverUserId(),
            'user_id'=>$chatData->getUserId(),
//            'massage_Time'=>(string)$chatData->getMassageTime(),
        ]);
        return $chat;
    }

    private function setAttributes(array $request,$chat){
        $chat->setmassage($request['massage']);
        $chat->setReceiverUserId($request['receiver_user_id']);
        $chat->setUserId($request['user_id']);
//        $chat->setMassageTime(Carbon::now()->format('d-m-Y H:i:s'));
        return $chat;
    }

}
