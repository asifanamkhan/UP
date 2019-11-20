<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SdgChartCount extends Model
{
    protected $casts=[
      'sanitation_dhoron'=>'array'
    ];
}
