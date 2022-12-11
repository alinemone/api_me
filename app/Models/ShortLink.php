<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    use HasFactory;

    const ID = 'id';
    const HASHID = 'hash_id';
    const LINK = 'link';

    protected $fillable = [
      self::HASHID,
      self::LINK,
    ];
}
