<?php

namespace Database\Seeders;

use App\Models\Portofolio;
use Illuminate\Database\Seeder;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portofolio::truncate();
        $portofolio = [
            [
                'user_id' => 3,
                'image' => 'thumbnail.jpeg',
                'desc' => 'sertifikat workshop makeup',
            ],
            [
                'user_id' => 3,
                'image' => 'thumbnail.jpeg',
                'desc' => 'professional makeup',
            ],
        ];
        
        foreach ($portofolio as $key => $value) {
            Portofolio::create($value);
        }
    }
}
