<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zamestnanec extends Model
{
    use HasFactory;
    protected $table = 'zamestnanci';

    protected $fillable = [
        'meno',
        'priezvisko',
        'email',
        'telefon',
        'zamestnany_od',
        'zamestnany_do',
        'oddelenie_id'
    ];
}
