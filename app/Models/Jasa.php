<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;
    protected $table = 'jasas';
    protected $fillable = [
        'user_id', 
        'category_id', 
        'portofolio_id', 
        'name', 
        'image', 
        'timestart', 
        'timestop', 
        'price', 
        'desc',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function portofolio()
    {
        return $this->belongsTo('App\Models\Portofolio');
    }
    public function review()
    {
        return $this->belongsTo('App\Models\Review');
    }
    public function jadwal()
    {
        return $this->belongsTo('App\Models\Jadwal');
    }
}
