<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'original',
        'large',
        'medium',
        'small',
    ];

    public const UPLOAD_FOLDER = 'upload/images';
    public const SMALL = '135x141';
    public const MEDIUM = '312x400';
    public const LARGE = '600x1000';

    public function imageable(){
        return $this->morphTo();
    }
}
