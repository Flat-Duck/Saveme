<?php

use Illuminate\Database\Seeder;

class EmergencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Emergency::class, 5)->create()->each(function ($emergency) {
            // $emergency->clink->addMediaFromUrl('https://source.unsplash.com/random/200x200')
            //     ->toMediaCollection('cover')
            // ;
        });
    }
}
