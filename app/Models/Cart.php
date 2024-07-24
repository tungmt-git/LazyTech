<?php
namespace App\Models;
 class Cart
 {
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;

    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }

    public function addCart($product,$id){
        $newProduct = ['quantity'=>0,'price'=>$product->cost,'productInfo'=>$product];
        if($this->products){
            if(array_key_exists($id,$this->products)){
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quantity'] ++;
        $newProduct['price']= $newProduct['quantity'] * $product->cost;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $newProduct['price'];
        $this->totalQuanty ++;
    }
    public function DeleteItemCart($id){
        $this->totalQuanty -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }
    public function UpdateItemCart($id,$quanty){
        $this->totalQuanty -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];

        $this->products[$id]['quantity'] = $quanty;
        $this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->cost;

        $this->totalQuanty += $this->products[$id]['quantity'];
        $this->totalPrice += $this->products[$id]['price'];
    }
 }
?>