<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];

    public function getDateFormatAttribute()
    {
        return date('F j Y, G:i', strtotime($this->created_at));
    }
}
