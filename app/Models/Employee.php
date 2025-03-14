<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'company_id', 'email', 'phone_number'];

    public function company()
        {
        return $this->belongsTo(Company::class);
        }
}