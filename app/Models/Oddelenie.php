<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oddelenie extends Model
{
    use HasFactory;
    protected $table = 'oddelenies';
    protected $fillable = ['nazov_oddelenia'];
}
