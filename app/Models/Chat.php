<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable=[
        'name', 'image_url', 'is_group'
    ];

    //Relación uno a muchos
    public function messages(){
        return $this->hasMany(Message::class);
    }


    //MUchos a muchos
    public function user(){
        return $this->belongsToMany(User::class);
    }

}
