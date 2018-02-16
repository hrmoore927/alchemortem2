<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'productName' => 'Snake Rib Earrings - Black', 
            'description' => 'These snake rib earrings have been dyed black and are attached with brass french hooks. There are 5 ribs on each earring.',
            'materials' => 'snake ribs, brass french hooks',
            'dimensions' => '2.5 in',
            'category' => 'earrings',
            'price' => 25
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Snake Rib Earrings - Blue', 
            'description' => 'These snake rib earrings have been dyed blue and are attached with silver french hooks. There are 2 ribs on each earring with a small vertebrae just below the hook.',
            'materials' => 'snake ribs, vertebrae, silver french hooks',
            'dimensions' => '2.5 in',
            'category' => 'earrings',
            'price' => 20
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Ombre Green Bead Vertebrae Hoops', 
            'description' => 'These hoops have multiple vertebrae separated by ombre style green beads.',
            'materials' => 'vertebrae, silver french hooks, green beads, silver hoops',
            'dimensions' => '45mm',
            'category' => 'earrings',
            'price' => 30
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Jawbone Earrings',
            'description' => 'These jawbone earrings are attached by chain with brass french hooks.',
            'materials' => 'jawbone, brass french hooks, brass chain',
            'dimensions' => '3.75 in',
            'category' => 'earrings',
            'price' => 25
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Large Vertebrae Hoops',
            'description' => 'These vertebrae hoops have multiple vertebrae per hoop. The earrings have a leverback closing.',
            'materials' => 'vertebrae, leverback silver hoops',
            'dimensions' => '70mm',
            'category' => 'earrings',
            'price' => 35
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Medium Vertebrae Hoops - Purple', 
            'description' => 'These silver hoops encircle a single vertebrae per earring topped by ombre purple beads. There hoops include silver french hooks.',
            'materials' => 'vertebrae, silver french hooks, purple beads, silver hoops',
            'dimensions' => '45mm',
            'category' => 'earrings',
            'price' => 30
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Medium Vertebrae Hoops', 
            'description' => 'These vertebrae are attached with silver french hooks. There are multiple vertebrae on each earring.',
            'materials' => 'vertebrae, silver french hooks, silver hoops',
            'dimensions' => '45mm',
            'category' => 'earrings',
            'price' => 30
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Medium Vertabrae Hoops - Black',
            'description' => 'These vertebrae have been dyed black and are attached with silver french hooks. There are multiple vertebrae on each earring.',
            'materials' => 'vertebrae, silver french hooks, silver hoops',
            'dimensions' => '45mm',
            'category' => 'earrings',
            'price' => 30
        ]);
        
        DB::table('products')->insert([
            'productName' => 'African Porcupine Quill Earrings',
            'description' => 'These earrings hold one black porcupine quill per earring. The quills are topped with two aqua blue beads and silver french hooks.',
            'materials' => 'quills, silver french hooks',
            'dimensions' => '5 in',
            'category' => 'earrings',
            'price' => 20
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Snake Rib Earrings - Rainbow', 
            'description' => 'These snake rib earrings have been dyed multiple colors on the tips and are attached with brass french hooks. There are 5 ribs on each earring.',
            'materials' => 'snake ribs, silver french hooks',
            'dimensions' => '3 in',
            'category' => 'earrings',
            'price' => 25
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Small 4 Vertebrae Hoops', 
            'description' => 'These brass hoops encircle 4 vertebrae. The hoops include brass french hooks',
            'materials' => 'vertebrae, brass french hooks, brass hoops',
            'dimensions' => '30mm',
            'category' => 'earrings',
            'price' => 25
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Small Vertebrae Earrings',
            'description' => 'These vertebrae are attached with brass french hooks. There are multiple vertebrae on each earring.',
            'materials' => 'vertebrae, brass french hooks, brass hoops',
            'dimensions' => '30mm',
            'category' => 'earrings',
            'price' => 25
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Stingray Barb Earrings', 
            'description' => 'These earrings hold one stingray barb per earring. They are held by brass french hooks.',
            'materials' => 'stingray barb, brass french hooks',
            'dimensions' => '5.5 in',
            'category' => 'earrings',
            'price' => 20
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Snake Rib Earrings', 
            'description' => 'These snake rib earrings are attached with brass french hooks. There is one rib on each earring with a small vertebrae just below the hook.',
            'materials' => 'snake rib, vertebrae, brass french hooks',
            'dimensions' => '3 in',
            'category' => 'earrings',
            'price' => 20
        ]);
    }
}
