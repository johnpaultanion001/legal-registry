<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TOI_TOTA extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_of_industry_id',
        'type_of_trade_act_id',
    ];

    public function type_of_industry()
    {
        return $this->belongsTo(TypeOfIndustry::class, 'type_of_industry_id', 'id');
    }

    public function type_of_trade_act()
    {
        return $this->belongsTo(TypeOfTradeAct::class, 'type_of_trade_act_id');
    }
}
