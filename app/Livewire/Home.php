<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\product_category;

class Home extends Component
{
    public $product_lenth;
    public $pagination;
    public $page_category;
    public $page_index = 1;
    public $products;
    public $product_price = 99999999;
    public $categorys;
    public function mount()
    {
        $this->change_category();
        $this->categorys = product_category::where('product_id', '!=', null)->get();
    }


    public function change_category()
    {
        $page_index = $this->page_index - 1;
        $page_index = json_encode($page_index * 20);
        if ($this->page_category != 'null' && $this->page_category != '') {
            $this->products = DB::select('select * from products  WHERE price <= ' . $this->product_price . ' AND category_id = ' . $this->page_category . ' LIMIT 20 OFFSET ' . $page_index);
            $pagin = DB::select('select * from products  WHERE price <= ' . $this->product_price . ' AND category_id = ' . $this->page_category . ' LIMIT 20 OFFSET ' . $page_index);
            $this->product_lenth = count($pagin);
        } else {
            $this->products = DB::select('select * from products  WHERE price <= ' . $this->product_price . ' LIMIT 20 OFFSET ' . $page_index);
            $pagin = DB::select('select * from products  WHERE price <= ' . $this->product_price . ' LIMIT 20 OFFSET ' . $page_index);
            $this->product_lenth = intval(count($pagin) / 3);
        }
    }
    public function change_page($pg)
    {
        if ($this->page_index != $pg) {
            $this->page_index = $pg;
            $this->change_category();
        }
    }

    public function change_salary($salary)
    {
        $this->product_price = $salary;
        $this->change_category();
    }

    public function logout()
    {
        auth()->logout();
    }

    public function render()
    {
        return view('livewire.home');
    }
}