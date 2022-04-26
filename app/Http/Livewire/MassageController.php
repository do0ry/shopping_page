<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MassageController extends Component
{
    public $users;
    public $receiver;
    public $massage;

    public function mount(){
        $this->users = User::all();
        $this->chat = Chat::with('user')->where('user_id',Auth::user()->id)->get() ?? '';
    }
    public function receiver($id){
        $this->receiver = $id;
    }
    public function send(){
//        dd(Carbon::now());
        $chat = chat::saveData([
            'massage'=>$this->massage,
            'receiver_user_id'=>$this->receiver,
            'user_id'=>Auth::user()->id,
        ]);
        dd($chat);
    }
    public function render()
    {
        return view('livewire.massage-controller');
    }
}
