<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'contact_id', 'subject', 'body', 'is_read', 'created_at', 'updated_at'
    ];
}
