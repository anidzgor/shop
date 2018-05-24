<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size = new \App\Size([
            'name' => 'S'
        ]);
        $size->save();

        $size = new \App\Size([
            'name' => 'M'
        ]);
        $size->save();

        $size = new \App\Size([
            'name' => 'L'
        ]);
        $size->save();

        $size = new \App\Size([
            'name' => '38'
        ]);
        $size->save();

        $size = new \App\Size([
            'name' => '39'
        ]);
        $size->save();

        $size = new \App\Size([
            'name' => '40'
        ]);
        $size->save();
    }
}
