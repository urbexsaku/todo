<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'user_id',
    ];

    public function user(){ //ユーザーは1人なのでuser単数
        return $this->belongsTo(user::class);
    }
}
