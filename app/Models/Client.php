<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'contact_number',
       
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function question_forms()
    {
        return $this->hasMany(QuestionForm::class, 'client_id' , 'id');
    }
    public function industries()
    {
        return $this->hasMany(Client_TOI::class, 'client_id' , 'id');
    }
    public function type_of_trades()
    {
        return $this->hasMany(Client_TOI::class, 'client_id' , 'id');
    }
   
}
