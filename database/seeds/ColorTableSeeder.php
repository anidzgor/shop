<?php

use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color = new \App\Color([
            'name' => 'white'
        ]);
        $color->save();

        $color = new \App\Color([
            'name' => 'black'
        ]);
        $color->save();

        $color = new \App\Color([
            'name' => 'red'
        ]);
        $color->save();

        $color = new \App\Color([
            'name' => 'blue'
        ]);
        $color->save();

        $color = new \App\Color([
            'name' => 'yellow'
        ]);
        $color->save();
    }
}
