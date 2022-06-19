<?php

namespace App\Models;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OutgoingRouting extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function provider_in()
    {
        return $this->belongsTo(Provider::class, 'provider_id_in', 'id');
    }

    public function provider_out()
    {
        return $this->belongsTo(Provider::class, 'provider_id_out', 'id');
    }
}
