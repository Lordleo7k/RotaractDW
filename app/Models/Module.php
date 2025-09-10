<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'slug', 'icon', 'is_active', 'order'];
    
    public function menus()
    {
        return $this->hasMany(Menu::class)->whereNull('parent_id')->orderBy('order');
    }
}