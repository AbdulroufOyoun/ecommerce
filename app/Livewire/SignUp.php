<?php

namespace App\Livewire;

use Livewire\Component;

class SignUp extends Component
{
    public $name;
    public $email;
    public $password;
    public $re_password;
    public function sign_up()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);
        auth()->login($user);
        redirect('/');
    }
    public function render()
    {
        if (!\Auth::check()) {
            return view('livewire.sign-up');
        }
    }
}
