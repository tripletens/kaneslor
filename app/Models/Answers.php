<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id', 'application_code', 'audio', 'video', 'status',
    ];
}
