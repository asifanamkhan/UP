<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoldingTaxFee extends Model
{
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function bosot_vitar_dhorons(){
        return $this->belongsTo(BosotVitarDhoron::class, 'bosot_vitar_dhoron')->withTrashed();
    }
    public function occupations(){
        return $this->belongsTo(Occupation::class, 'occupation')->withTrashed();
    }
    public function tax_classs(){
        return $this->belongsTo(TaxClass::class, 'tax_class')->withTrashed();
    }
}
