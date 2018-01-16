<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Message
 * @package App
 *
 * @property string $text
 */
class Message extends Model
{
    protected $fillable = ['text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
