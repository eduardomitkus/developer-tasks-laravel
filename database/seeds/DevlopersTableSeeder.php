<?php

use Illuminate\Database\Seeder;
use App\Model\Developer\Developer;

class DevlopersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Developer::create([
            'name'      => 'Nathaly',
            'email'     => 'nathaly@gmail.com',
            'password'  => bcrypt('nathaly'),
        ]);
    }
}
