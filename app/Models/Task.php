<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['task', 'start_time', 'completed_at', 'user_id'];

    public function User(){ // this funtion represents prop so that we can access it which means accessing the User model (table)
        return $this->belongsTo(User::class);
    }
}
