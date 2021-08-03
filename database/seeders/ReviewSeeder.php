<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::truncate();
        $review = [
            [
                'user_id' => 4,
                'jasa_id' => 1,
                'star' => '5',
                'comment' => 'Pengerjaannya cepat dengan hasil terbaik',
            ],
            [
                'user_id' => 5,
                'jasa_id' => 2,
                'star' => '5',
                'comment' => 'Pengerjaannya cepat dengan hasil terbaik',
            ],
        ];
        
        foreach ($review as $key => $value) {
            Review::create($value);
        }
    }
}
