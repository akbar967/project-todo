<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    protected $fillable = ['title','description','completed']; 
    
    protected function carts(): array
    {
        return ['is_completed' => 'boolean'];
    }
}
