<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrashCan extends Model
{
    protected $fillable = [
        'methaneLevel', 'carbonDioxideLevel', 'temperature', 'humidity'
    ];
}
