<?php

namespace App\Models;

use App\Models\Number;
use App\Models\Sippeers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sip()
    {
        return $this->hasOne(Sippeers::class, 'name', 'uniqid');
    }

    public function numbers()
    {
        return  $this->hasMany(Number::class, 'provider_uniqid', 'uniqid');
    }
}
