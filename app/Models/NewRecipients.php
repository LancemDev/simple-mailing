<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewRecipients extends Model
{
    use HasFactory;

    protected $table = 'new_recipients';

    protected $fillable=[
        'first_name',
        'last_name',
        'company',
        'role',
        'mobile_number',
        'email'
    ];
}
