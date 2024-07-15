<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleChangeRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'userid',
        'requested_role',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }


    
}
