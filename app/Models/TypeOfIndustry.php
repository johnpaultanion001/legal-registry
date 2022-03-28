<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfIndustry extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function toi_tota()
    {
        return $this->hasMany(TOI_TOTA::class, 'type_of_industry_id' , 'id')->orderBy('created_at', 'asc');
    }

    public function question_form_answers()
    {
        return $this->hasMany(QuestionForm::class, 'title_of_law_id' , 'id')->where('client_id', auth()->user()->client->id);
    }
    public function client_industries()
    {
        return $this->hasMany(Client_TOI::class, 'type_of_industry_id' , 'id')->where('client_id', auth()->user()->client->id ?? '');
    }
}
