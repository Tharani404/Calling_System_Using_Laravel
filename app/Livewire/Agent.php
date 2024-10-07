<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class Agent extends Component
{

    public $users;
    public $loggedInUserId;
    

    public function mount()
    {
        $this->users = User::all();
        $this->loggedInUserId = Auth::id();
    }
    
    public function render()
    {
        return view('livewire.agent', [
            'users' => $this->users,
            'loggedInUserId' => $this->loggedInUserId,
        ]);
    }
}
