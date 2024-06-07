<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable=[
        'body', 'is_read', 'user_id', 'chat_id'
    ];

    //RELACION UNO A MUCHOS INVERSA
    public function chat(){
        return $this->belongsToMany(Chat::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }


}
