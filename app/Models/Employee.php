<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'company', 'email', 'phone_number'];

    public function company()
        {
            return $this->belongsTo(Company::class, 'company');
        }
}