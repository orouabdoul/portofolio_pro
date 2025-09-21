<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_id',
        'subject',
        'message',
        'admin_name',
        'admin_email',
        'sent_successfully',
        'error_message',
    ];
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
