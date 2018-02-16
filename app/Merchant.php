<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    //
    protected $table = 'users';

    public function terminals()
    {
        return $this->hasMany(Terminal::class, 'merchant_id', 'merchant_id');
    }
}
