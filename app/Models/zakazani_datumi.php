<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class zakazani_datumi extends Model
{
    protected $table  = 'zakazani_datumi'; #da ne promjeni ime tablice (da ne doda s na kraju zbog mnozine)
    protected $fillable = ['name', 'email', 'datum', 'broj', 'marka'];
}
