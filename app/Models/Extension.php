<?php

namespace App\Models;

use App\Models\Number;
use App\Models\Sippeers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Extension extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    

    public function sip()
    {
        return $this->hasOne(Sippeers::class);
    }

    public function user()
    {
        return $this->belongsTo(Extension::class);
    }

    public function numbers()
    {
        return $this->hasMany(Number::class, 'exten', 'number');
    }
}
