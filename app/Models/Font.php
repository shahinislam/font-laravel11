<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Font extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'path'];

    public function fontGroups() {
        return $this->belongsToMany(FontGroup::class);
    }
}
