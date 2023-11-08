<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UUID extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'del', 'created'];
    public $timestamps = false;
}
