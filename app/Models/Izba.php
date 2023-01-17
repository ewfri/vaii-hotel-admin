<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izba extends Model
{
    use HasFactory;
    protected $table = 'izbas';
    protected $fillable = ['obrazok','popis','izba',];
}
