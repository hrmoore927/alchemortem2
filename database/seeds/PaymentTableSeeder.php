<?php

use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment')->insert([
            'payment_type' => 'Stripe'
        ]);
        
        DB::table('payment')->insert([
            'payment_type' => 'Square'
        ]);
    }
}
