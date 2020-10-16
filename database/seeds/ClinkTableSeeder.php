<?php

use Illuminate\Database\Seeder;

class ClinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Clink::class, 5)->create()->each(function ($clink) {
        //    $clink->addMediaFromUrl('https://source.unsplash.com/random/200x200')
          //      ->toMediaCollection('cover')
           // ;
        });
    }
}
