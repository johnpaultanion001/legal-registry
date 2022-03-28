<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'title_of_law_id',
        'applicability',
        'iywd',
        'compliance_status',
        'remarks',
        'file_remarks',
        'rpdhn',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function title_of_law()
    {
        return $this->belongsTo(TitleOfLaw::class, 'title_of_law_id', 'id');
    }
}
