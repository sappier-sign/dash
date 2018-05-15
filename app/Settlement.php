<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    protected $fillable = ['id','BATCHCODE','SETLDATE','TRANSTYPE','MERCHID','RSWITCH','TOTVOL','TOTVAL','CHARGES','NET','DATECREATED'];
    protected $table = 'settlement_summary';
}
