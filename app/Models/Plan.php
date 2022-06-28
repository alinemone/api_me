<?php

namespace App\Models;

use App\Models\GlobalScopes\IsNotExpired;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPriceAttribute($value)
    {
        return $value / 10;
    }
}
