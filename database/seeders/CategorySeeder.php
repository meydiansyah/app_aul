<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $category = [
            [
                'name' => 'Basic Make Up (Party, Graduation or Daily Make Up)',
                'slug' => 'basic-make-up',
            ],
            [
                'name' => 'Bridesmaid Make Up',
                'slug' => 'bridesmaid-make-up',
            ],
            [
                'name' => 'Mother or Sister of The Bride Make Up',
                'slug' => 'mother-or-sister-of-the-bride-make-up',
            ],
            [
                'name' => 'Engagement Make Up',
                'slug' => 'engagement-make-up',
            ],
            [
                'name' => 'Prewedding Makeup (No Retouch)',
                'slug' => 'prewedding-make-up',
            ],
            [
                'name' => 'PreWedding Make Up (Full Day include Retouch)',
                'slug' => 'pre-wedding-make-up-full',
            ],
            [
                'name' => 'Wedding Make Up',
                'slug' => 'wedding-make-up',
            ],
            [
                'name' => 'Photoshoot Make Up',
                'slug' => 'photoshoot-make-up',
            ],
            [
                'name' => 'Sweet 17th Birthday Make Up',
                'slug' => 'sweet-17th-birthday-make-up',
            ],
            [
                'name' => 'Traditional Wedding Make Up',
                'slug' => 'traditional-wedding-make-up',
            ],
            [
                'name' => 'Character, SPFX, Prostethic Make Up',
                'slug' => 'character&spfx&prostethic-make-up',
            ],
            [
                'name' => 'Beauty Class',
                'slug' => 'beauty-class',
            ],
        ];
        
        foreach ($category as $key => $value) {
            Category::create($value);
        }
    }
}
