<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'id',
        'name',
        'designation',
        'email',
        'office_id',
        'phone_number',
        'gender',
    ];
}
