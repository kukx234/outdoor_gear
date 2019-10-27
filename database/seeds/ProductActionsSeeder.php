<?php

use Illuminate\Database\Seeder;
use App\Models\Product_action;

class ProductActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 100 ; $i++) { 
            Product_action::insert([
                'discount' => $i,
            ]);
        }
    }
}
