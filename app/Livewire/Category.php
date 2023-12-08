<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\product_category;
use Illuminate\Support\Facades\Auth;

class Category extends Component
{
    public $categorys, $category, $is_master, $category_name;
    public $perent_id;
    public $new_category;
    public function mount()
    {
        $this->categorys = product_category::latest()->get();
    }

    public function add_Master_category()
    {
        if (\Auth::user()->level  >= 2) {
            $this->validate([
                'category' => 'required',
            ]);

            product_category::create([
                'category' => $this->category,

            ]);
            $this->categorys = product_category::latest()->get();
        }
    }

    public function take_id($id)
    {
        $this->perent_id = $id;
    }

    public function category_name($id)
    {
        $this->category_name = $id;
    }


    public function add_category()
    {
        if (\Auth::user()->level  >= 2) {
            $this->validate([
                'category' => 'required',
            ]);
            product_category::create([
                'category' => $this->category,
                'product_id' => $this->perent_id
            ]);
            $this->categorys = product_category::latest()->get();
        }
    }

    public function delete_category()
    {
        if (\Auth::check()) {
            if (Auth::user()->level >= 2) {
                $this->categorys = product_category::find($this->perent_id);
                if ($this->categorys != null) {
                    $this->categorys->delete();
                    $this->categorys = product_category::latest()->get();
                }
            }
        }
    }



    public function render()
    {
        if (\Auth::check()) {
            if (Auth::user()->level >= 2) {
                return view('livewire.category');
            }
        }
    }
}
