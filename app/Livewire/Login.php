<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (\Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            /**
             *      @var User $user
             */
            $user = \Auth::user();
            \Auth::login($user);
            redirect('/');
        }
    }
    public function render()
    {
        if (!\Auth::check()) {
            return view('livewire.login');
        }
    }
}
