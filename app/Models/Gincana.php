<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gincana extends Model
{
    use HasFactory;
    protected $fillable = 
    ['endereco', 'lat', 'lng', 'user_id'];
}
