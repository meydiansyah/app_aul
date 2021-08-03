<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'user_id', 
        'jasa_id', 
        'pembayaran_id', 
        'phone', 
        'price', 
        'address', 
        'total_people', 
        'status',
        'booking_date',
        'booking_start',
        'booking_end',
        'created_at',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function jasa()
    {
        return $this->belongsTo('App\Models\Jasa');
    }
    public function pembayaran()
    {
        return $this->belongsTo('App\Models\Pembayaran');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function jadwal()
    {
        return $this->belongsTo('App\Models\Jadwal');
    }
}
