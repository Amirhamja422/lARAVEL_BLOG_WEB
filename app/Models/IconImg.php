<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IconImg extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_name',
        'image'
    ];
}
