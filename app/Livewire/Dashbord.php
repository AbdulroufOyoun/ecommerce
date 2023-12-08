<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Dashbord extends Component
{
    public $admins;
    public $users;

    public $userId;
    public $useremail;

    public $account;

    public function mount()
    {
        if (\Auth::check()) {
            if (Auth::user()->level >= 2) {
                $this->admins = User::where('level', '>=', 2)->select('email', 'id')->get();
                $this->users = User::where('level',  1)->select('email', 'id')->get();
            }
        }
    }

    public function user_id($id)
    {
        $this->userId = $id;
    }

    public function user_email($email)
    {
        $this->useremail = $email;
    }

    public function update_user()
    {
        if (\Auth::user()->level == 3) {
            $user = User::find($this->userId);
            $user->level = 2;
            $user->save();
            $this->admins = User::where('level', '>=', 2)->select('email', 'id')->get();
            $this->users = User::where('level',  1)->select('email', 'id')->get();
        }
    }

    public function drop_admin()
    {
        if (\Auth::user()->level == 3) {
            $user = User::find($this->userId);
            $user->level = 1;
            $user->save();
            $this->admins = User::where('level', '>=', 2)->select('email', 'id')->get();
            $this->users = User::where('level',  1)->select('email', 'id')->get();
        }
    }

    public function render()
    {
        return view('livewire.dashbord');
    }
}
