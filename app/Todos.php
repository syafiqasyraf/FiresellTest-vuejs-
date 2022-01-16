<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    
    protected $fillable = [
        'message',
        'is_complete',
        'user_id',
        'name',
        'extension',
        'size',
        'path',
    ];
   
}
