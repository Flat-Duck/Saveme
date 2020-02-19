<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ClinkTableSeeder::class);
        $this->call(DeviceTableSeeder::class);
        $this->call(SpecialtyTableSeeder::class);
        $this->call(DoctorTableSeeder::class);
        $this->call(TestTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(EmergencyTableSeeder::class);
        $this->call(AppointmentTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}
