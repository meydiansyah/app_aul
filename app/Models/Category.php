<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $fillable = ['name', 'slug', 'created_at'];
    
    public function jasa()
    {
        return $this->hasMany('App\Models\Jasa');
    }
    public function jadwal()
    {
        return $this->belongsTo('App\Models\Jadwal');
    }
}
