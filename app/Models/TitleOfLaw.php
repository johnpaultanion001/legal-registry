<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitleOfLaw extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_of_trade_act_id',
        'subtitle_of_law_id',
        'title',
        
    ];

    public function type_of_trade_act()
    {
        return $this->belongsTo(TypeOfTradeAct::class, 'type_of_trade_act_id', 'id');
    }
    public function subtitle_of_law()
    {
        return $this->belongsTo(SubtitleOfLaw::class, 'subtitle_of_law_id', 'id');
    }
    
    public function question_form_answers()
    {
        return $this->hasMany(QuestionForm::class, 'title_of_law_id' , 'id')->where('client_id', auth()->user()->client->id);
    }
}
