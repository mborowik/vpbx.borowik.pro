<?php

namespace App\Models;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Number extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function provider()
    {
        return $this->belongsTo(Provider::class ,'provider_uniqid', 'uniqid');
    }

    public function extension()
    {
        return $this->hasOne(Extension::class ,'exten', 'number');
    }
}
