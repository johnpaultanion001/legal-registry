<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_TOI extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'type_of_industry_id',
    ];

    public function type_of_industry()
    {
        return $this->belongsTo(TypeOfIndustry::class, 'type_of_industry_id', 'id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
