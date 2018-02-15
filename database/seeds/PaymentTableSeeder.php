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
            'type_payment' => 'Stripe'
        ]);
        
        DB::table('payment')->insert([
            'type_payment' => 'Square'
        ]);
    }
}
