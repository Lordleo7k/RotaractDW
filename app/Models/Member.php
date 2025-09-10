<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'position',
        'join_date',
        'status',
        'notes'
    ];
    
    protected $casts = [
        'join_date' => 'date',
    ];
}