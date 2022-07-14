<?php

namespace App\Models;

use App\Models\Provider;
use App\Models\Extension;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sip extends Model
{
    use HasFactory;
    protected $guarded = [];



    public static $options = ['cckna' => 'Międzynarodowy (11 cyfr)',
    '+cckna' =>'Międzynarodowy +(11 cyfr)',
    'kna' =>'Krajowy (9 cyfr)'];
    

    protected static function boot()
    {
        parent::boot();

        self::creating(function($model){

            $model->user_id = auth()->id();
            $model->firm_id = 1;
        });
    }





    public function provider()
    {
        return $this->belongsTo(Provider::class, 'uniqid', 'uniqid');
    }

    public function extension()
    {
        return $this->belongsTo(Extension::class);
    }
}
