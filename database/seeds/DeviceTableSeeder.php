<?php

use Illuminate\Database\Seeder;

class DeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Device::class, 5)->create()->each(function ($device) {
            // $device->addMediaFromUrl('https://source.unsplash.com/random/200x200')
            //     ->toMediaCollection('picture')
            // ;

            // $device->clink->addMediaFromUrl('https://source.unsplash.com/random/200x200')
            //     ->toMediaCollection('cover')
            // ;
        });
    }
}
