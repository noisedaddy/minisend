<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email_id',
        'path',
        'name',
        'mime',
        'uniqueID'
    ];

    public function email(){
        return $this->belongsTo(Email::class, 'uniqueID', 'uniqueID');
    }
}
