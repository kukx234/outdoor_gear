<?php

use Illuminate\Database\Seeder;
use App\Models\Colone;

class KolonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <= 10 ; $i++) { 
            Colone::insert([
                'colona' => $i,
            ]);
        }
    }
}
