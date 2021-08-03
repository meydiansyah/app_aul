<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolios';
    protected $fillable = ['user_id', 'image', 'desc', 'created_at'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function jasa()
    {
        return $this->hasMany('App\Models\Jasa');
    }
}
