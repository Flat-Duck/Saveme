<?php

use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Doctor::class, 5)->create()->each(function ($doctor) {
            // $doctor->addMediaFromUrl('https://source.unsplash.com/random/200x200')
            //     ->toMediaCollection('picture')
            // ;

            // $doctor->clink->addMediaFromUrl('https://source.unsplash.com/random/200x200')
            //     ->toMediaCollection('cover')
            // ;
        });
    }
}
