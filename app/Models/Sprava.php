<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprava extends Model
{
    use HasFactory;
    protected $table = 'spravas';
    protected $fillable = ['meno','priezvisko','email','telefon', 'predmet', 'obsah', 'vybavene'];
}
