<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Chat;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\CartProduct;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);

        //Creación de 10 usuarios
        User::factory(10)
        //2 direcciones por usuario
        ->hasAddresses(2)
        ->hasPhone()
        ->hasProducts(3)
        ->create();

        //Creando Carrito (1 peoducto) y Chat (Por el mismo producto) para cada usuario
        $users = User::all();
        foreach ($users as $user){
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->save();

           //Añadir producto a carrito
            $product = Product::inRandomOrder()->limit(1)->first();
        
            //Está bien, no tocar
            $product->carts()->save($cart);

            
            //Crear chat
            $chat = new Chat();
            $user2 = User::inRandomOrder()->limit(1)->first();
            $chat->emit = $user->id;
            $chat->recept = $user2->id;

       
            //Asignar el mismo producto a chat
            $chat->product_id = $product->id;

            //Guardar
            $chat->save();
        };

      
        

        Order::factory(3)->create();

        /*
        \App\Models\User::factory()->create([
            'name' => 'cata',
            'email' => 'cata@cata.com',
            'password' => '0000',

      ]);*/
        }
    
}
