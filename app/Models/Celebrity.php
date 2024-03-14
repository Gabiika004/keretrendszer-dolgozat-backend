<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celebrity extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'age', 'job','alive', 'activeFrom'];
}
