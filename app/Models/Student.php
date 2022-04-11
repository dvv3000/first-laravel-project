<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Datetime;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getFullName()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getAge()
    {
        $date = new DateTime($this->birthday);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    public function getGender()
    {
        return ($this->gender === 1) ? 'Male' : 'Female';
    }
}
