<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    // fields that can be mass assigned
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    // employer has many jobs
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
