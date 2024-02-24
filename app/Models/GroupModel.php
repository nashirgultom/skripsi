<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupModel extends Model
{
    use HasFactory;

    protected $table = 'group';
    protected $guarded = ['id'];


    public function users()
    {
        return $this->belongsToMany(User::class, 'auth_group_users', 'group_id', 'user_id');
    }
}
