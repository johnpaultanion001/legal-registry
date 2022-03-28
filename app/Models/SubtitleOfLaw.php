<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubtitleOfLaw extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_of_trade_act_id',
        'title',
    ];

    public function title_of_laws()
    {
        return $this->hasMany(TitleOfLaw::class, 'subtitle_of_law_id' , 'id');
    }
}
