<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'level',
        'status_id',
        'image',
        'phone',
        'gender',
        'city',
        'address',
        'desc',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
    public function freelancer()
    {
        return $this->hasOne('App\Models\Freelancer');
    }
    public function client()
    {
        return $this->hasOne('App\Models\Client');
    }
    public function jasa()
    {
        return $this->hasOne('App\Models\Jasa');
    }
    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }
    public function review()
    {
        return $this->hasOne('App\Models\Review');
    }
    public function portofolio()
    {
        return $this->hasOne('App\Models\Portofolio');
    }
    public function jadwal()
    {
        return $this->hasOne('App\Models\Jasa');
    }
}
