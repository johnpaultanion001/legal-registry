<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfTradeAct extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file',
    ];

    public function toi_tota()
    {
        return $this->hasMany(TOI_TOTA::class, 'type_of_trade_act_id' , 'id');
    }

    public function title_of_laws()
    {
        return $this->hasMany(TitleOfLaw::class, 'type_of_trade_act_id' , 'id');
    }
    public function subtitle_of_laws()
    {
        return $this->hasMany(SubtitleOfLaw::class, 'type_of_trade_act_id' , 'id');
    }
}
