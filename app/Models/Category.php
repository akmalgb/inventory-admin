<?php

namespace App\Models;

use App\Models\Scopes\UserIdScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope(new UserIdScope);
    }

    public function Users()
    {
        return $this->belongsTo(User::class);
    }

    public function Products()
    {
        return $this->hasMany(Product::class);
    }

}
