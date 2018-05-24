<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()
    {
        // $product = new \App\Product([
        //     'imagePath' => 'red-dress.jpg',
        //     'title' => 'Summer dress',
        //     'description' => 'I shrouded my body in one of the sacklike print dresses, also pink, with baby-blue flowers, that I d bought off a street rack in Rome. I would have preferred the big red roses or the orange dahlias: this dress made me look like an expanse of wallpaper. But I wanted something inconspicuous.',
        //     'price' => 10,
        //     'amount_sell' => 0,
        //     'amount' => 10,
        //     'id_category' => 3,
        //     'id_color' => 4,
        //     'id_size' => 1
        // ]);
        // $product->save();

        // $product = new \App\Product([
        //     'imagePath' => 'white-dress.jpg',
        //     'title' => 'Summer dress',
        //     'description' => 'I shrouded my body in one of the sacklike print dresses, also pink, with baby-blue flowers, that I d bought off a street rack in Rome. I would have preferred the big red roses or the orange dahlias: this dress made me look like an expanse of wallpaper. But I wanted something inconspicuous.',
        //     'price' => 10,
        //     'amount_sell' => 0,
        //     'amount' => 10,
        //     'id_category' => 3,
        //     'id_color' => 1,
        //     'id_size' => 1
        // ]);
        // $product->save();

        // $product = new \App\Product([
        //     'imagePath' => 'green-dress.jpg',
        //     'title' => 'Summer dress',
        //     'description' => 'I shrouded my body in one of the sacklike print dresses, also pink, with baby-blue flowers, that I d bought off a street rack in Rome. I would have preferred the big red roses or the orange dahlias: this dress made me look like an expanse of wallpaper. But I wanted something inconspicuous.',
        //     'price' => 10,
        //     'amount_sell' => 0,
        //     'amount' => 10,
        //     'id_category' => 3,
        //     'id_color' => 3,
        //     'id_size' => 1
        // ]);
        // $product->save();

        $product = new \App\Product([
            'imagePath' => 'green-dress.jpg',
            'title' => 'Summer dress',
            'description' => 'I shrouded my body in one of the sacklike print dresses, also pink, with baby-blue flowers, that I d bought off a street rack in Rome. I would have preferred the big red roses or the orange dahlias: this dress made me look like an expanse of wallpaper. But I wanted something inconspicuous.',
            'price' => 10,
            'amount_sell' => 0,
            'amount' => 10,
            'id_category' => 3,
            'id_color' => 3,
            'id_size' => 2
        ]);
        $product->save();
    }
}
