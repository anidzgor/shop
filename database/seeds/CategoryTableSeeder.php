<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Category([
            'name' => 'T-shirt'
        ]);
        $category->save();

        $category = new \App\Category([
            'name' => 'shoes'
        ]);
        $category->save();

        $category = new \App\Category([
            'name' => 'dress'
        ]);
        $category->save();
    }
}
