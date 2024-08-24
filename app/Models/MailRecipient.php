<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailRecipient extends Model
{
    use HasFactory;

    protected $fillable = [
        'mail_id',
        'recipient_id',
        'email'
    ];
}
