<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poruke extends Model
{
    protected $table  = 'poruke';
    protected $fillable = ['name', 'email', 'poruka'];
}
