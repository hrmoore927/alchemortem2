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
            'image1' => 'https://i.imgur.com/tvtH4G7.jpg',
            'image2' => 'https://i.imgur.com/hBTIGR7.jpg',
            'image3' => 'https://i.imgur.com/Cr3jKd1.jpg',
            'description' => 'These snake rib earrings have been dyed black and are attached with brass french hooks. There are 5 ribs on each earring.',
            'materials' => 'snake ribs, brass french hooks',
            'dimensions' => '2.5 in',
            'category' => 'earrings',
            'price' => 25,
            'status' => 'available'
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Snake Rib Earrings - Blue', 
            'image1' => 'https://i.imgur.com/10Eo23d.jpg',
            'image2' => 'https://i.imgur.com/FRY8IdW.jpg',
            'description' => 'These snake rib earrings have been dyed blue and are attached with silver french hooks. There are 2 ribs on each earring with a small vertebrae just below the hook.',
            'materials' => 'snake ribs, vertebrae, silver french hooks',
            'dimensions' => '2.5 in',
            'category' => 'earrings',
            'price' => 20,
            'status' => 'available'
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Ombre Green Bead Vertebrae Hoops', 
            'image1' => 'https://i.imgur.com/55tKUXW.jpg',
            'image2' => 'https://i.imgur.com/RgxRb0Z.jpg',
            'description' => 'These hoops have multiple vertebrae separated by ombre style green beads.',
            'materials' => 'vertebrae, silver french hooks, green beads, silver hoops',
            'dimensions' => '45mm',
            'category' => 'earrings',
            'price' => 30,
            'status' => 'available'
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Jawbone Earrings',
            'image1' => 'https://i.imgur.com/5BfMPm5.jpg',
            'image2' => 'https://i.imgur.com/zbBrZJL.jpg',
            'image3' => 'https://i.imgur.com/kIcM6Hc.jpg',
            'description' => 'These jawbone earrings are attached by chain with brass french hooks.',
            'materials' => 'jawbone, brass french hooks, brass chain',
            'dimensions' => '3.75 in',
            'category' => 'earrings',
            'price' => 25,
            'status' => 'available'
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Large Vertebrae Hoops',
            'image1' => 'https://i.imgur.com/V1mCYq3.jpg',
            'image2' => 'https://i.imgur.com/qsHA6Mh.jpg',
            'image3' => 'https://i.imgur.com/HvU4VCt.jpg',
            'image4' => 'https://i.imgur.com/X8HWyHv.jpg',
            'description' => 'These vertebrae hoops have multiple vertebrae per hoop. The earrings have a leverback closing.',
            'materials' => 'vertebrae, leverback silver hoops',
            'dimensions' => '70mm',
            'category' => 'earrings',
            'price' => 35,
            'status' => 'available'
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Medium Vertebrae Hoops - Purple', 
            'image1' => 'https://i.imgur.com/ONBhVe9.jpg',
            'image2' => 'https://i.imgur.com/Ci69uSq.jpg',
            'image3' => 'https://i.imgur.com/o9e2V1E.jpg',
            'description' => 'These silver hoops encircle a single vertebrae per earring topped by ombre purple beads. There hoops include silver french hooks.',
            'materials' => 'vertebrae, silver french hooks, purple beads, silver hoops',
            'dimensions' => '45mm',
            'category' => 'earrings',
            'price' => 30,
            'status' => 'available'
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Medium Vertebrae Hoops',
            'image1' => 'https://i.imgur.com/xoIzl6k.jpg',
            'image2' => 'https://i.imgur.com/91bfPdS.jpg',
            'image3' => 'https://i.imgur.com/286cwqu.jpg',
            'description' => 'These vertebrae are attached with silver french hooks. There are multiple vertebrae on each earring.',
            'materials' => 'vertebrae, silver french hooks, silver hoops',
            'dimensions' => '45mm',
            'category' => 'earrings',
            'price' => 30,
            'status' => 'available'
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Medium Vertabrae Hoops - Black',
            'image1' => 'https://i.imgur.com/8xb2kN8.jpg',
            'image2' => 'https://i.imgur.com/BexrRZ6.jpg',
            'image3' => 'https://i.imgur.com/z0SETjI.jpg',
            'description' => 'These vertebrae have been dyed black and are attached with silver french hooks. There are multiple vertebrae on each earring.',
            'materials' => 'vertebrae, silver french hooks, silver hoops',
            'dimensions' => '45mm',
            'category' => 'earrings',
            'price' => 30,
            'status' => 'available'
        ]);
        
        DB::table('products')->insert([
            'productName' => 'African Porcupine Quill Earrings',
            'image1' => 'https://i.imgur.com/Bn6dTMe.jpg',
            'image2' => 'https://i.imgur.com/f5Ik2pz.jpg',
            'description' => 'These earrings hold one black porcupine quill per earring. The quills are topped with two aqua blue beads and silver french hooks.',
            'materials' => 'quills, silver french hooks',
            'dimensions' => '5 in',
            'category' => 'earrings',
            'price' => 20,
            'status' => 'available'
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Snake Rib Earrings - Rainbow',
            'image1' => 'https://i.imgur.com/wCQLm8q.jpg',
            'image2' => 'https://i.imgur.com/WBEdv4M.jpg',
            'image3' => 'https://i.imgur.com/39FmveJ.jpg',
            'description' => 'These snake rib earrings have been dyed multiple colors on the tips and are attached with brass french hooks. There are 5 ribs on each earring.',
            'materials' => 'snake ribs, silver french hooks',
            'dimensions' => '3 in',
            'category' => 'earrings',
            'price' => 25,
            'status' => 'available'
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Small 4 Vertebrae Hoops',
            'image1' => 'https://i.imgur.com/2BaADQm.jpg',
            'image2' => 'https://i.imgur.com/8XuTcfY.jpg',
            'image3' => 'https://i.imgur.com/cdIbh8N.jpg',
            'description' => 'These brass hoops encircle 4 vertebrae. The hoops include brass french hooks',
            'materials' => 'vertebrae, brass french hooks, brass hoops',
            'dimensions' => '30mm',
            'category' => 'earrings',
            'price' => 25,
            'status' => 'available'
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Small Vertebrae Earrings',
            'image1' => 'https://i.imgur.com/E8aRSzK.jpg',
            'image2' => 'https://i.imgur.com/WxbdzvJ.jpg',
            'image3' => 'https://i.imgur.com/PhXdSgB.jpg',
            'description' => 'These vertebrae are attached with brass french hooks. There are multiple vertebrae on each earring.',
            'materials' => 'vertebrae, brass french hooks, brass hoops',
            'dimensions' => '30mm',
            'category' => 'earrings',
            'price' => 25,
            'status' => 'available'
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Stingray Barb Earrings',
            'image1' => 'https://i.imgur.com/Ic1bG76.jpg',
            'image2' => 'https://i.imgur.com/8Z9fDOd.jpg',
            'image3' => 'https://i.imgur.com/tkWHtgh.jpg',
            'description' => 'These earrings hold one stingray barb per earring. They are held by brass french hooks.',
            'materials' => 'stingray barb, brass french hooks',
            'dimensions' => '5.5 in',
            'category' => 'earrings',
            'price' => 20,
            'status' => 'available'
        ]);
        
        DB::table('products')->insert([
            'productName' => 'Snake Rib Earrings', 
            'image1' => 'https://i.imgur.com/3ZWTyLb.jpg',
            'image2' => 'https://i.imgur.com/x2mhKNr.jpg',
            'image3' => 'https://i.imgur.com/dvj0aBI.jpg',
            'description' => 'These snake rib earrings are attached with brass french hooks. There is one rib on each earring with a small vertebrae just below the hook.',
            'materials' => 'snake rib, vertebrae, brass french hooks',
            'dimensions' => '3 in',
            'category' => 'earrings',
            'price' => 20,
            'status' => 'available'
        ]);
    }
}