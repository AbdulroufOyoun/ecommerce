<?php

namespace App\Livewire;

use App\Models\product as ModelsProduct;
use App\Models\product_category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Product extends Component
{
    use WithFileUploads;

    public $test;

    public $name;
    public $description;
    public $price;
    public $category_id;
    public $image;
    public $products, $categorys;
    public $productId;

    public $new_name,
        $new_description,
        $new_price,
        $new_category_id,
        $new_poster;
    public $pr_ID;
    public $pr_name;

    public function mount()
    {
        $this->products = ModelsProduct::latest()->get();
        $this->categorys = product_category::where('product_id', '!=', null)->get();
    }

    public function uploade()
    {

        if (\Auth::user()->level  >= 2) {
            $this->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'category_id' => 'required',
                'image' => 'required',
            ]);
            $store_file = $this->image->store('uploads', 'public');
            ModelsProduct::create([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'category_id' => $this->category_id,
                'poster' => pathinfo($store_file)['basename'],
            ]);
            $this->products = ModelsProduct::latest()->get();
        }
    }

    public function product_id($id)
    {
        $this->productId = ModelsProduct::find($id)->first();
        $this->new_name = $this->productId->name;
        $this->new_description = $this->productId->description;
        $this->new_price = $this->productId->price;
        $this->new_poster = $this->productId->poster;
        $this->new_category_id = $this->productId->category_id;
    }

    public function prodID($id)
    {
        $this->pr_ID = $id;
    }
    public function prodname($id)
    {
        $this->pr_name = $id;
    }
    public function delelte_product()
    {
        if (\Auth::user()->level  >= 2) {
            $product = ModelsProduct::find($this->pr_ID);
            $product->delete();
            $this->products = ModelsProduct::latest()->get();
        }
    }

    public function update_product()
    {
        if (\Auth::user()->level  >= 2) {

            $product = ModelsProduct::find($this->productId->id);

            $product->name = $this->new_name;
            $product->description = $this->new_description;
            $product->price = $this->new_price;
            $product->category_id = $this->new_category_id;
            if ($this->new_category_id != null) {
                $store_file = $this->new_poster->store('uploads', 'public');

                $product->poster = pathinfo($store_file)['basename'];
            }

            $product->save();
            $this->products = ModelsProduct::latest()->get();
        }
    }
    public function render()
    {
        if (\Auth::check()) {
            if (Auth::user()->level >= 2) {
                return view('livewire.product');
            }
        }
    }
}
