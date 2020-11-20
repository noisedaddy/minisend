<?php

namespace App\Models;

use App\Listeners\LogSentMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Email extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'sender',
        'recipient',
        'subject',
        'text_content',
        'html_content',
        'status',
        'uniqueID'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function attachments(){
        return $this->hasMany(Attachment::class, 'uniqueID', 'uniqueID');
    }
}
