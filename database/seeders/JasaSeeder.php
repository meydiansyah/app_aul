<?php

namespace Database\Seeders;

use App\Models\Jasa;
use Illuminate\Database\Seeder;

class JasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jasa::truncate();
        $jasa = [
            [
                'name' => 'Glow Like Maudy',
                'user_id' => 3,
                'category_id' => 1,
                'portofolio_id' => 1,
                'timestart' => '10:00',
                'timestop' => '15:00',
                'price' => '10.000.000,00',
                'desc' => 'sertifikat workshop makeup',
            ],
            [
                'name' => 'Waker Pro Make Up',
                'user_id' => 3,
                'category_id' => 1,
                'portofolio_id' => 2,
                'timestart' => '10:00',
                'timestop' => '15:00',
                'price' => '5.000.000,00',
                'desc' => 'professional makeup',
            ],
        ];
        
        foreach ($jasa as $key => $value) {
            Jasa::create($value);
        }
    }
}
