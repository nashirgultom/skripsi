<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jam extends Model
{
    use HasFactory;

    protected $table = 'jam';
    protected $guarded = ['id'];
}
