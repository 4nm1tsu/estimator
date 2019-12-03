<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clear extends Model
{
    protected $table = 'clears';
    protected $primaryKey = 'id';

    //仕方ないのでidをサロゲート（代理）キーに

    protected function rules(){
        return [
            'id' => 'integer',
            'm_id' => 'integer',
            'u_id' => 'integer',
            'info' => 'integer'
        ];
    }

    protected $fillable=[
        'id',
        'm_id',
        'u_id',
        'info'
    ];
}
