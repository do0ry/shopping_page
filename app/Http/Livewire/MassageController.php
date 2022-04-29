<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class MassageController extends Component
{
    public $users;
    public $receiver;
    public $massage;
    public $sentMassages = [];
    public $receivedMassages = [];


    public function mount(){
        $this->users = User::all();
    }
    public function receiver($id){
        $this->receiver = $id;
    }
    public function send(){
        chat::saveData([
            'massage'=>$this->massage,
            'receiver_user_id'=>$this->receiver,
            'user_id'=>Auth::user()->id,
        ]);
        $this->sentMassages = Chat::with('user')->where('user_id',Auth::user()->id)->where('receiver_user_id',$this->receiver)->get() ?? '';
        $this->receivedMassages = Chat::with('user')->where('user_id',$this->receiver)->where('receiver_user_id',Auth::user()->id)->get() ?? '';
    }

    public function render()
    {
        return view('livewire.massage-controller');
    }
}
