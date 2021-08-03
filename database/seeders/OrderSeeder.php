<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();
        $order = [
            [
                'user_id' => 6,
                'jasa_id' => 1,
                'phone' => '085767113554',
                'address' => 'Jl.Gading Raya II',
                'total_people' => '2',
                'status' => 'disapproved',
                'booking_date' => '2021-07-14',
                'booking_start' => '08:30',
                'booking_end' => '11:00',
            ],
            [
                'user_id' => 5,
                'jasa_id' => 2,
                'phone' => '085767113554',
                'address' => 'Jl.Gading Raya I',
                'total_people' => '3',
                'status' => 'disapproved',
                'booking_date' => '2021-07-14',
                'booking_start' => '08:30',
                'booking_end' => '11:00',
            ],
        ];
        
        foreach ($order as $key => $value) {
            Order::create($value);
        }
    }
}
