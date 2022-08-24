<?php

namespace App\Models;

use App\Models\Scopes\UserIdScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplying extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope(new UserIdScope);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
