<?php
namespace App;

use Jenssegers\Mongodb\Model;

/**
 * Message
 *
 * @author Lim Afriyadi <lim.afriyadi.id@gmail.com>
 */
class Message extends Model
{
    protected $collection = 'user_message';
    
    protected $fillable = array('to', 'sender', 'subject', 'message', 'context');


    public function fromMember()
    {
        return $this->belongsTo('\App\User', 'sender');
    }
    
    public function replies()
    {
        return $this->hasMany('\App\Message', 'context');
    }
    
    public function toMember()
    {
        return $this->hasOne('\App\User', 'to');
    }
}
