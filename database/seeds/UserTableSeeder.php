<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Mateo',
            'email' => 'kukx234@gmail.com',
            'street_adress' => 'Brajsina 23',
            'city' => 'Rijeka',
            'post_code' => '51000',
            'password' => 'lozinka4$',
            'role_id' => 1,
        ]);

        User::insert([
            'name' => 'Martina',
            'email' => 'martina@gmail.com',
            'street_adress' => 'Brajsina 23',
            'city' => 'Rijeka',
            'post_code' => '51000',
            'password' => 'lozinka4$',
            'role_id' => 2,
        ]);
    }
}
