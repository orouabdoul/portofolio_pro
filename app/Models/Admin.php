<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    protected $fillable = ['email', 'password'];
    // Admin table includes timestamps in migration; allow Eloquent to manage them
    public $timestamps = true;
}
