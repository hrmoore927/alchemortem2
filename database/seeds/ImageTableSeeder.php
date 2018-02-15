<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'image1' => '../../public/images/black-rib-multiple-1.jpg',
            'image2' => '../../public/images/black-rib-multiple-2.jpg',
            'image3' => '../../public/images/black-rib-multiple-3.jpg'
        ]);
        
        DB::table('images')->insert([
            'image1' => '../../public/images/blue-rib-double-1.jpg',
            'image2' => '../../public/images/blue-rib-double-2.jpg'
        ]);
        
        DB::table('images')->insert([
            'image1' => '../../public/images/green-bead-medium-vert-earrings-1.jpg',
            'image2' => '../../public/images/green-bead-medium-vert-earrings-2.jpg'
        ]);
        
        DB::table('images')->insert([
            'image1' => '../../public/images/jawbone-earrings-1.jpg',
            'image2' => '../../public/images/jawbone-earrings-2.jpg',
            'image3' => '../../public/images/jawbone-earrings-3.jpg'
        ]);
        
        DB::table('images')->insert([
            'image1' => '../../public/images/large-vert-earrings-1.jpg',
            'image2' => '../../public/images/large-vert-earrings-2.jpg',
            'image3' => '../../public/images/large-vert-earrings-3.jpg',
            'image4' => '../../public/images/large-vert-earrings-4.jpg'
        ]);
        
        DB::table('images')->insert([
            'image1' => '../../public/images/medium-hoops-vert-purple-1.jpg',
            'image2' => '../../public/images/medium-hoops-vert-purple-2.jpg',
            'image3' => '../../public/images/medium-hoops-vert-purple-3.jpg'
        ]);
        
        DB::table('images')->insert([
            'image1' => '../../public/images/medium-vert-earrings-1.jpg',
            'image2' => '../../public/images/medium-vert-earrings-2.jpg',
            'image3' => '../../public/images/medium-vert-earrings-3.jpg'
        ]);
        
        DB::table('images')->insert([
            'image1' => '../../public/images/medium-vert-earrings-black-1.jpg',
            'image2' => '../../public/images/medium-vert-earrings-black-2.jpg',
            'image3' => '../../public/images/medium-vert-earrings-black-3.jpg'
        ]);
        
        DB::table('images')->insert([
            'image1' => '../../public/images/quill-earrings-1.jpg',
            'image2' => '../../public/images/quill-earrings-2.jpg'
        ]);
        
        DB::table('images')->insert([
            'image1' => '../../public/images/rainbow-rib-multiple-1.jpg',
            'image2' => '../../public/images/rainbow-rib-multiple-2.jpg',
            'image3' => '../../public/images/rainbow-rib-multiple-3.jpg'
        ]);
        
        DB::table('images')->insert([
            'image1' => '../../public/images/small-hoops-3-vert-1.jpg',
            'image2' => '../../public/images/small-hoops-3-vert-2.jpg',
            'image3' => '../../public/images/small-hoops-3-vert-3.jpg'
        ]);
        
        DB::table('images')->insert([
            'image1' => '../../public/images/small-vert-earrings-1.jpg',
            'image2' => '../../public/images/small-vert-earrings-2.jpg',
            'image3' => '../../public/images/small-vert-earrings-3.jpg'
        ]);
        
        DB::table('images')->insert([
            'image1' => '../../public/images/stingray-earrings-1.jpg',
            'image2' => '../../public/images/stingray-earrings-2.jpg',
            'image3' => '../../public/images/stingray-earrings-3.jpg'
        ]);
        
        DB::table('images')->insert([
            'image1' => '../../public/images/white-rib-single-1.jpg',
            'image2' => '../../public/images/white-rib-single-2.jpg',
            'image3' => '../../public/images/white-rib-single-3.jpg',
        ]);
    }
}
