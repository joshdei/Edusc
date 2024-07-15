<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
   
    use HasFactory;

    // Specify the table name if it does not follow the Laravel convention
    protected $table = 'schools';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'userid', 'school_name', 'school_motto', 'school_logo', 'school_address', 'school_city', 'school_state',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
