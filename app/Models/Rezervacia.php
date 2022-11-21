<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezervacia extends Model
{
    use HasFactory;

    protected $fillable = ['meno','priezvisko','od','do', 'osoby'];
}
