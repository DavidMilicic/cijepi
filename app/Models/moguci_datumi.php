<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class moguci_datumi extends Model
{
    protected $table  = 'moguci_datumi'; #da ne promjeni ime tablice (da ne doda s na kraju zbog mnozine)
    protected $fillable = ['datum'];
}
