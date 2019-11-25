<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrashCan extends Model
{
    protected $table = 'trash_cans';
    
    protected $fillable = [
        'methaneLevel', 'carbonDioxideLevel', 'temperature', 'humidity'
    ];
}
