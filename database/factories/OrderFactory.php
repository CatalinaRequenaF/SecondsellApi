<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     public function definition() : array
     {
 
         // Creo un usuario
         $user = User::inRandomOrder()->limit(1)->first();
        
         $products = Product::inRandomOrder()->limit(3)->get();
 
         // Create order
         $order = new Order(); 
         $order->save();
 
         $order->user()->associate($user);      
 
         // Associate items to this order
         foreach ($products as $product) {
 
             // Create item order
             $orderItem = new OrderItem();
 
             $orderItem->price = $product->price;
             $orderItem->seller_id=$product->seller_id;            
 
             // Associate this item to the order
             $orderItem->order()->associate($order);
 
             // Associate the product to the order item
             $orderItem->product()->associate($product);
             //$orderItem->name=$product->name();
 
             // Save order item
             $orderItem->save();
 
         }
         $order->calculateSubtotal();
         return [];
     }
}
