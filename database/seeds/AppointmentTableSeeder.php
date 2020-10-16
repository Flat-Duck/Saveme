<?php

use Illuminate\Database\Seeder;

class AppointmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Appointment::class, 5)->create()->each(function ($appointment) {
            // $appointment->clink->addMediaFromUrl('https://source.unsplash.com/random/200x200')
            //     ->toMediaCollection('cover')
            // ;

            // $appointment->doctor->addMediaFromUrl('https://source.unsplash.com/random/200x200')
            //     ->toMediaCollection('picture')
            // ;
        });
    }
}
