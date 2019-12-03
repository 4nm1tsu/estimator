<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'musics';

    protected $guarded = [
        'm_id',
        'name',
        'e',
        'n',
        'h',
        'exh',
        'fc'
    ];
}
